<?php

namespace App\DataFixtures;

use App\Factory\JobFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i<10; $i++) {
            JobFactory::createOne([
                'title' => 'Cơ hội việc làm ' . $i,
                'content' => 'Nội dung cơ hội việc làm ' . $i,
                'contact' => 'Cơ hội việc làm  liên hệ' . $i,
            ]);
        }
    }
}
