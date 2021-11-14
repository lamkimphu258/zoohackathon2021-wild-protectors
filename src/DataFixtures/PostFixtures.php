<?php

namespace App\DataFixtures;

use App\Entity\PostStatus;
use App\Factory\PostFactory;
use App\Repository\CategoryRepository;
use App\Repository\LinkRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private UserRepository $userRepository,
        private CategoryRepository $categoryRepository,
        private LinkRepository $linkRepository
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $volunteers = $this->userRepository->findBy(['email' => 'volunteer@email.com']);
        $links = $this->linkRepository->findAll();
        $categories = $this->categoryRepository->findAll();

        foreach ($links as $link) {
            $number = rand(0, 2);
            PostFactory::createOne([
                'user' => $volunteers[0],
                'link' => $link,
                'category' => $categories[$number],
                'status' => PostStatus::APPROVED,
            ]);
        }
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            LinkFixtures::class,
            CategoryFixtures::class
        ];
    }
}
