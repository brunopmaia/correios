<?php

namespace Dafiti\Correios\Service;

use Dafiti\Correios\Entity;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new Client(
            new Entity\Config([
                'wsdl' => 'http://webservicescolhomologacao.correios.com.br/ScolWeb/WebServiceScol?wsdl',
                'usuario' => '60618043',
                'senha' => '8o8otn',
                'codAdministrativo' => '08082650',
                'contrato' => '9912208555',
            ])
        );
    }

    public function testSolicitarRange()
    {
        $this->assertTrue($this->client->solicitarRange('AP', '', 1) instanceof \Dafiti\Correios\Entity\ResponseObject);
    }
}
