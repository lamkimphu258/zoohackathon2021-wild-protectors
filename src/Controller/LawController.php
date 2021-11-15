<?php

namespace App\Controller;

use App\Repository\LawRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LawController extends AbstractController
{
    public function __construct(
        private LawRepository $lawRepository
    ) {
    }

    #[Route('/laws', name: 'app_law_index')]
    public function index(): Response
    {
        $laws = $this->lawRepository->findAll();
        return $this->render('law/index.html.twig', [
            'laws' => $laws,
        ]);
    }

    #[Route('/laws/{id}', name: 'app_law_show')]
    public function show(string $id): Response
    {
        $law = $this->lawRepository->findOneBy(['id' => $id]);
        return $this->render('law/show.html.twig', [
            'law' => $law,
        ]);
    }
}
