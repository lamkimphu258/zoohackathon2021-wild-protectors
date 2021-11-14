<?php

namespace App\DataFixtures;

use App\Factory\LinkFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LinkFixtures extends Fixture
{
    protected const NUMBER_OF_LINKS = 10;

    public function load(ObjectManager $manager): void
    {
        LinkFactory::createMany(self::NUMBER_OF_LINKS);
    }
}
