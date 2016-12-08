<?php

namespace Tests\Integracao\LaDesk\API;

use Integracao\LaDesk\API\CustomerApi;
use Tests\Integracao\LaDesk\PHPUnit;

/**
 * Class CustomerApiTest
 * @package Tests\Integracao\LaDesk\API
 */
class CustomerApiTest extends PHPUnit
{

    /**
     * @var CustomerApi
     */
    private $_customerApi;

    /**
     * CustomerApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_customerApi = new CustomerApi($this->client);
    }

    public function test_adicionar()
    {
        $response = $this->_customerApi->adicionar([
            'email' => 'adrianolaselva@gmail.com',
            'phone' => '(11) 98606-6232',
            'name' => 'Adriano Moreira La Selva',
            'gender' => 'M',
            'role' => 'V',
            'password' => '123mudar',
            'customfields' => json_encode([
                'id' => 9999
            ]),
            'uniquefields' => json_encode([]),
            'note' => '',
            'send_registration_mail' => 'N',
        ]);

        var_dump($response);
    }

//    public function test_listar()
//    {
//        var_dump($this->_customerApi->filtrar([]));
//    }

}