<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ForgotPasswordType;
use App\Form\ResetPasswordType;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class ForgotPasswordController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    private SessionInterface $session;

    private UserRepository $userRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        SessionInterface $session,
        UserRepository $userRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->session = $session;
        $this->userRepository = $userRepository;
    }

    #[Route('/forgot-password', name:'forgot_password', methods:['GET', 'POST'])]
    public function sendRecoveryLink(
        Request $request,
        SendEmailMessage $sendEmailMessage,
        TokenGeneratorInterface $tokenGenerator
    ): Response
    {
        $form = $this->createForm(ForgotPasswordType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user = $this->userRepository->findOneBy([
                'email' => $form['email']->getData()
            ]);

            /* je creer un leure, meme si on fait une demande de reinitialisation le message est quand même écris comme ca on donne aucune info */
            if (!$user) {
                $this->addFlash('success', 'Un email vous a été envoyé pour redéfinir votre mot de passe.');
                return $this->redirectToRoute('app_login');
            }

            $user->setForgotPasswordToken($tokenGenerator->generateToken())
                 ->setForgotPasswordTokenRequestedAt(new \DateTimeImmutable('now'))
                 ->setForgotPasswordTokenMustBeVerifiedBeFore(new \DateTimeImmutable('+15 minutes'));

            $this->entityManager->flush();

            $sendEmailMessage->send([
                'recipient_email' => $user->getEmail(),
                'subject'         => 'Modification de votre mot de passe',
                'html_template'   => 'forgot_password/forgot_password_email.html.twig',
                'context'         => [
                    'user' => $user
                ]
            ]);

            $this->addFlash('success', 'Un email vous a été envoyé pour redéfinir votre mot de passe.');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('forgot_password/forgot_password_step_1.html.twig', [
            'forgotPasswordFormStep1' => $form->createView(),
        ]);
    }

    #[Route('/forgot-password/{id<\d+>}/{token}', name:'retrieve_credentials', methods:['GET'])]
    public function retrieveCredentialsFromTheURL(
        string $token,
        User $user
    ): RedirectResponse
    {
        $this->session->set('Reset-Password-Token-URL', $token);

        $this->session->set('Reset-Password-User-Email', $user->getEmail());
    
        return $this->redirectToRoute('reset_password');
    }

    #[Route('/reset-password', name: 'reset_password', methods: ['GET', 'POST'])]
    public function resetPassword(
        Request $request,
        UserPasswordEncoderInterface $encoder
    ): Response
    {
        [
            'token' => $token,
            'userEmail' => $userEmail
        ] = $this->getCredentialsFromSession();

        $user = $this->userRepository->findOneBy([
            'email' => $userEmail
        ]);

        if (!$user) {
            return $this->redirectToRoute('forgot_password');
        }

        /** @var \DateTimeImmutable $forgotPasswordTokenMustBeVerifiedBefore */
        $forgotPasswordTokenMustBeVerifiedBefore = $user->getForgotPasswordTokenMustBeVerifiedBefore();

        if (($user->getForgotPasswordToken() === null) || ($user->getForgotPasswordToken() !== $token) || ( $this->isNotRequestedInTime($forgotPasswordTokenMustBeVerifiedBefore))){
            return $this->redirectToRoute('forgot_password');
        }

        $form = $this->createForm(ResetPasswordType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($encoder->encodePassword($user, $form['password']->getData()));

            /* we clear the token to make it unusable. */
            $user->setForgotPasswordToken(null)
                 ->setForgotPasswordTokenVerifiedAt(new \DateTimeImmutable('now'));

            $this->entityManager->flush();

            $this->removeCredentialsFromSession();

            $this->addFlash('success', 'Votre mot de passe a été modifié, vous pouvez à présent vous conecter.');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('forgot_password/forgot_password_step_2.html.twig', [
            'forgotPasswordFormStep2' => $form->createView(),
            'passwordMustBeModifiedBefore' => $this->passwordMustBeModifiedBefore($user)
        ]);

    }

    /**
     * Gets the user ID and token from the session.
     *
     * @return array
     */
    private function getCredentialsFromSession(): array
    {
        return [
            'token'     => $this->session->get('Reset-Password-Token-URL'),
            'userEmail' => $this->session->get('Reset-Password-User-Email')
        ];
    }

    /**
     * Validates or not the fact that the link was clicked in the alloted time.
     *
     * @param \DateTimeImmutable $forgotPasswordTokenMustBeVerifiedBefore
     * @return boolean
     */
    private function isNotRequestedInTime(\DateTimeImmutable $forgotPasswordTokenMustBeVerifiedBefore): bool
    {
        return (new \DateTimeImmutable('now') > $forgotPasswordTokenMustBeVerifiedBefore);
    }

    /**
     * Removes the user ID and token from the session.
     *
     * @return void
     */
    private function removeCredentialsFromSession(): void
    {
        $this->session->remove('Reset-Password-Token-URL');

        $this->session->remove('Reset-Password-User-Email');
    }

    /**
     * Returns the time before which the password must be changed.
     *
     * @param User $user
     * @return string The time in this format: 12h00
     */
    private function passwordMustBeModifiedBefore(User $user): string
    {
        /** @var \DateTimeImmutable $forgotPasswordTokenMustBeVerifiedBefore  */
        $passwordMustBeModifiedBefore = $user->getForgotPasswordTokenMustBeVerifiedBefore();

        return $passwordMustBeModifiedBefore->format('H\hi');
    }
}
