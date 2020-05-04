<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 4; $i++) { 
            $category = new Categorie();
            $category->setName('categorie n°' . $i);

            $manager->persist($category);

            for ($j=0; $j < 5; $j++) { 
                $article = new Article();
                $article->setTitle('Article n°' . $i)
                        ->setContent('Lorem Ipsum ...')
                        ->setCreatedAt(new \DateTime())
                        ->setCategory($category);
                
                $manager->persist($article);
            }
        }
        $manager->flush();
    }
}
