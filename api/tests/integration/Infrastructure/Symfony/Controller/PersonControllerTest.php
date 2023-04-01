<?php

declare(strict_types=1);

namespace Tests\Integration\Infrastructure\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PersonControllerTest extends WebTestCase
{
    public function testApiRequestGetPersonResponseCode200(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/person');

        $this->assertResponseStatusCodeSame(200);
    }

    public function testApiRequestGetPersonResponseHasKeyFistname(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/person');

        $finishedData = json_decode($client->getResponse()->getContent(true), true);
        $this->assertArrayHasKey('firstname', $finishedData);
    }

    public function testApiRequestGetPersonResponseHasKeyLastname(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/person');

        $finishedData = json_decode($client->getResponse()->getContent(true), true);
        $this->assertArrayHasKey('lastname', $finishedData);
    }

    public function testApiRequestGetPersonResponseHasKeyEmail(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/person?options[]=email');

        $finishedData = json_decode($client->getResponse()->getContent(true), true);
        $this->assertArrayHasKey('email', $finishedData);
    }
}
