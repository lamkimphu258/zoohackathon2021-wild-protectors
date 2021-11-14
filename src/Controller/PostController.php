<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/posts', name: 'app_post_index')]
    public function index(
        PostRepository $postRepository,
        CategoryRepository $categoryRepository,
        Request $request
    ): Response {
        $approvedPosts = null;
        if ($request->query->get('categoryId')) {
            $category = $categoryRepository->findOneBy(['id' => $request->query->get('categoryId')]);
            $approvedPosts = $postRepository->findApprovedPostBy($category);
        } else {
            $approvedPosts = $postRepository->findApprovedPost();
        }
        $categories = $categoryRepository->findAll();

        return $this->render('post/index.html.twig', [
            'approvedPosts' => $approvedPosts,
            'categories' => $categories,
        ]);
    }

    #[Route('/posts/{id}', name: 'app_post_show')]
    public function show(PostRepository $postRepository, string $id): Response
    {
        $approvedPost = $postRepository->findOneBy(['id' => $id]);
        return $this->render('post/show.html.twig', [
            'approvedPost' => $approvedPost
        ]);
    }
}
