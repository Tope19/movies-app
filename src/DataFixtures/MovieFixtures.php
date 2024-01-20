<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $movie = new Movie();
       $movie->setTitle("The Dark Knight");
       $movie->setReleaseYear(2008);
       $movie->setDescription("When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.");
       $movie->setImagePath("https://cdn.pixabay.com/photo/2021/06/18/11/22/batman-6345897_960_720.jpg");
       // Add Data to Pivot table
       $movie->addActor($this->getReference("actor_1"));
       $movie->addActor($this->getReference("actor_2"));
       $manager->persist($movie);

       $movie2 = new Movie();
       $movie2->setTitle("Avengers: Endgame");
       $movie2->setReleaseYear(2019);
       $movie2->setDescription("After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.");
       $movie2->setImagePath("https://cdn.pixabay.com/photo/2020/10/28/10/02/captain-america-5692937_1280.jpg");

       // Add Data to Pivot table
       $movie2->addActor($this->getReference("actor_3"));
       $movie2->addActor($this->getReference("actor_4"));
       $manager->persist($movie2);

       $manager->flush();
    }
}
