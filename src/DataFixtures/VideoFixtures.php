<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VideoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTimeImmutable();
        
        $video = new Video();
        $video->setTitre("App");
        $video->setDescription("Voici des apps");
        $video->setVideoName("app.mp4");
        $video->setUpdatedAt($date);
        $manager->persist($video);
        
        $video = new Video();
        $video->setTitre("Cosmique");
        $video->setDescription("c'est quoi se truc !!!!!");
        $video->setVideoName("cosmique.mp4");
        $video->setUpdatedAt($date);
        $manager->persist($video);
        
        $video = new Video();
        $video->setTitre("Explosion");
        $video->setDescription("Voici une explosion");
        $video->setVideoName("explosion.mp4");
        $video->setUpdatedAt($date);
        $manager->persist($video);
        
        $video = new Video();
        $video->setTitre("Immeuble");
        $video->setDescription("Voici un immeuble, c'est moche");
        $video->setVideoName("immeuble.mp4");
        $video->setUpdatedAt($date);
        $manager->persist($video);
        
        $video = new Video();
        $video->setTitre("Loading");
        $video->setDescription("Voici un chargement, juste pour faire chier");
        $video->setVideoName("loading.mp4");
        $video->setUpdatedAt($date);
        $manager->persist($video);

        $manager->flush();
    }
}
