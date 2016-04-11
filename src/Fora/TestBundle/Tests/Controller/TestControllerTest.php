<?php

namespace Fora\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function testAddtest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AddTest');
    }

    public function testDeletetest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/DeleteTest');
    }

}
