<?php


namespace App\Service;


use App\ApiClient\ApiClient;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GithubApiService
{
    private ApiClient $apiClient;
    private string $personal_token;
    private const BASE_URL = 'https://api.github.com/';

    public function __construct(ApiClient $apiClient, $personal_token) {
        $this->apiClient = $apiClient;
        $this->personal_token = $personal_token;
    }

    public function getRepos() {
        $url = self::BASE_URL.'user/repos';
        $apiResponse = $this->apiClient->getRequest($url, $this->personal_token);
        if($apiResponse) {
            return $this->filterRepos($apiResponse);
        } else {
            throw new HttpException(400);
        }

    }

    private function filterRepos($items) {
        $repos = [];
        foreach($items as $item) {
            $repos[] = [
                'name' => $item['name'],
                'url' => $item['html_url'],
                'private' => $item['private'],
            ];
        }

        return $repos;
    }
}