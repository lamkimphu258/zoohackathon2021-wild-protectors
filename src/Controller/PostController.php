<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/posts', name: 'app_post_index')]
    public function index(PostRepository $postRepository): Response
    {
        $approvedPosts = $postRepository->findApprovedPost();
        return $this->render('post/index.html.twig', [
            'approvedPosts' => $approvedPosts
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
