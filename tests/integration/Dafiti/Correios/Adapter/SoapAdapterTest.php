<?php

namespace Dafiti\Correios\Adapter;

use Dafiti\Correios\Entity;

class SoapAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Dafiti\Correios\Adapter\SoapAdapter
     * @access private
     */
    private $adapter;

    /**
     * @var \Dafiti\Correios\Entity\Config
     * @access private
     */
    private $config;

    public function setUp()
    {
        $this->config = new Entity\Config([
            'wsdl' => 'http://webservicescolhomologacao.correios.com.br/ScolWeb/WebServiceScol?wsdl',
            'usuario' => '60618043',
            'senha' => '8o8otn',
            'codAdministrativo' => '08082650',
            'contrato' => '9912208555',
        ]);

        //$this->config->setLogPath(ROOT."logs/");
        $this->adapter = new SoapAdapter($this->config);
    }


    /**
     * @expectedException \SoapFault
     */
    public function testShouldMakeUnsuccessfulCall()
    {
        $request = new Entity\RequestObject([
            'idContrato' => '9912208555',
            'idCartão' => '0057018901',
            'usuario' => 'sigep',
            'senha' => 'n5f9t8'
        ]);

        $this->adapter->call("buscaCliente", $request);
    }
}
