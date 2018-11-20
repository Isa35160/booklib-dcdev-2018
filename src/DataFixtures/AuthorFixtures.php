<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $authors = [

           ["JK", "Rowling"],
           ["Victor", "Hugo"],
           ["René", "Goscinny"],
           ["Emile", "Zola"],

        ];

        foreach ($authors as $author) {
            $auth = new Author();
            $auth->setFirstname($author[0]);
            $auth->setLastname($author[1]);
            $manager->persist($auth);
            $this->setReference('author-' . strtolower($author[1]), $auth);
        }

        $manager->flush();
    }

}
