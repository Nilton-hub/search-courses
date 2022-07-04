<?php

namespace cc\src;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author Nilton Duarte <tvirapegubeco@gmail.com>
 * @package cc\src\src\SearchCourses
 */
class SearchCourses
{
	/** @var ClientInterface */
	private ClientInterface $httpClient;

	/** @var Crawler */
	private Crawler $crawler;

	public function __construct(ClientInterface $httpClient, Crawler $crawler)
	{
		$this->httpClient = $httpClient;
		$this->crawler = $crawler; 
	}

	public function search(string $url): array
	{
		$response = $this->httpClient->request('GET', $url);
		$this->crawler->addHtmlContent($response->getBody());
		$coursesElements = $this->crawler->filter('span.card-curso__nome');
		$courses = [];
		foreach ($coursesElements as $element) {
			$courses[] = $element->textContent;
		}
		return $courses;
	}
}
