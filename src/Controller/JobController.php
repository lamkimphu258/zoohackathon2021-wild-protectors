<?php

namespace App\Controller;

use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    #[Route('/jobs', name: 'app_job_index')]
    public function index(JobRepository $jobRepository): Response
    {
        $jobs = $jobRepository->findAll();
        return $this->render('job/index.html.twig', [
            'jobs' => $jobs
        ]);
    }
}
