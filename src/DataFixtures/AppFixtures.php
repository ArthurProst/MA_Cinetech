<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $categories = [];
        foreach (['Science-Fiction', 'Action', 'Thriller', 'Comédie', 'Drame'] as $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $categories[] = $category;
        }

        for ($i = 0; $i < 30; $i++) {
            $movie = new Movie();
            $movie->setTitre(ucfirst($faker->words(3, true)))
                ->setSynopsis(ucfirst($faker->words(10, true)))
                ->setNotePresse($faker->randomFloat(1, 0, 10))
                ->setDuree($faker->randomFloat(2, 0, 5))
                ->setAffiche(ucfirst($faker->words(3, true)))
                ->setDateSortie($faker->dateTime())
                ->setCategory($faker->randomElement($categories));
            $manager->persist($movie);
        }

        $manager->flush();
    }
}
