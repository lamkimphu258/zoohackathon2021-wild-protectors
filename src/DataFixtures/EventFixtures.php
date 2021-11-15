<?php

namespace App\DataFixtures;

use App\Factory\EventFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i<10; $i++) {
            EventFactory::createOne([
                'title' => 'Sự kiện bảo vệ động vật hoang dã ' . $i,
                'content' => 'Nội dung sự kiện bảo vệ động vật hoang dã ' . $i,
                'contact' => 'Bảo vệ động vật hoang dã liên hệ ' . $i,
            ]);
        }
    }
}
