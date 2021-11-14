<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    protected const CATEGORY_NAMES = [
        'Cực kì nguy cấp (CI)',
        'Nguy cấp (IN)',
        'Sẽ nguy cấp (VN)'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORY_NAMES as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
