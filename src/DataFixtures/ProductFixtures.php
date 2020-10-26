<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++) {

            $product = new Product();
            $product->setTitre("Produit n°$i")
                    ->setDescription("Description du produit n°$i")
                    ->setImage("http://via.placeholder.com/640x360")
                    ->setPrix(rand(1000, 10000)/100);
            $manager->persist($product);
        } 

        $manager->flush();
    }
}
