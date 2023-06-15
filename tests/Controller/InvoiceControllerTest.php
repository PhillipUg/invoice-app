<?php

namespace App\Tests\Controller;

use App\Entity\Invoice;
use App\Factory\InvoiceFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class InvoiceControllerTest extends WebTestCase
{
    public function testShowInvoice(): void
    {
        $client = static::createClient();

        $invoice = InvoiceFactory::createOne();

        $crawler = $client->request('GET', '/invoice/'.$invoice->getId());

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('Invoice', $crawler->filter('h1')->text());
    }

    public function testNewInvoiceForm(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/invoice/new');

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('Create Invoice', $crawler->filter('h1')->text());
    }
}
