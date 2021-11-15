<?php

namespace App\DataFixtures;

use App\Factory\LawFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LawFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        LawFactory::createMany(100);
    }
}
