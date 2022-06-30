<?php

namespace App\Controller;

use App\Service\GithubApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GithubRepositoriesController extends AbstractController
{

    #[Route('/github/repositories', name: 'app_github_repositories')]
    public function getRepositoriesList(GithubApiService $githubApiService, string $username): Response
    {
        $repositories = $githubApiService->getRepos();
        return $this->render('github_repositories/index.html.twig', [
            'username' => $username,
            'repositories' => $repositories,
        ]);
    }
}
