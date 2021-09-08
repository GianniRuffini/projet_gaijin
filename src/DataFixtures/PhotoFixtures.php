<?php

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PhotoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTimeImmutable();
        
        $photo = new Photo();
        $photo->setTitre("Chat");
        $photo->setDescription("Voici le petit chat");
        $photo->setImageName('chat.jpg');
        $photo->setUpdatedAt($date);
        $manager->persist($photo);
        
        $photo = new Photo();
        $photo->setTitre("Fleur");
        $photo->setDescription("Voici une fleur");
        $photo->setImageName('fleur.jpg');
        $photo->setUpdatedAt($date);
        $manager->persist($photo);
        
        $photo = new Photo();
        $photo->setTitre("Mouette");
        $photo->setDescription("Voici des mouettes");
        $photo->setImageName('mouette.jpg');
        $photo->setUpdatedAt($date);
        $manager->persist($photo);
        
        $photo = new Photo();
        $photo->setTitre("Tablette");
        $photo->setDescription("Voici une tablette");
        $photo->setImageName('tablette.jpg');
        $photo->setUpdatedAt($date);
        $manager->persist($photo);
        
        $photo = new Photo();
        $photo->setTitre("Goutte");
        $photo->setDescription("Voici des gouttes");
        $photo->setImageName('goutte.jpg');
        $photo->setUpdatedAt($date);
        $manager->persist($photo);
        
        $manager->flush();
    }
}
