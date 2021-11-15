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

        for ($i = 0; $i < count($links); $i++) {
            $number = rand(0, 2);
            PostFactory::createOne([
                'title' => 'Bài nghiên cứu '.$i,
                'description' => 'Mô tả bài nghiên cứu '.$i,
                'content' => 'Nội dung bài nghiên cứu '.$i,
                'user' => $volunteers[0],
                'link' => $links[$i],
                'category' => $categories[$number],
                'status' => PostStatus::APPROVED,
            ]);
        }
//        foreach ($links as $link) {
//
//        }
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
