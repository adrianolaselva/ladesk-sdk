<?php

namespace Tests\Integracao\LaDesk\API;

use Integracao\LaDesk\API\CompanyApi;
use Tests\Integracao\LaDesk\PHPUnit;

/**
 * Class CompanyApiTest
 * @package Tests\Integracao\LaDesk\API
 */
class CompanyApiTest extends PHPUnit
{

    /**
     * @var CompanyApi
     */
    private $_companyApi;

    /**
     * CustomerApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_companyApi = new CompanyApi($this->client);
    }

//    public function test_listar()
//    {
//        var_dump($this->_companyApi->filtrar([]));
//    }

}