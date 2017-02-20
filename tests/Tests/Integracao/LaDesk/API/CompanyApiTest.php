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
    private $companyApi;

    private static $companyKey;

    /**
     * CustomerApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->companyApi = new CompanyApi($this->client);
    }

    public function test_filtrar()
    {
        $response = $this->companyApi->filtrar([
            'name' => 'TEST_SDK_ALT'
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);

        if(isset($response['response']['companies'][0]['id']))
            self::$companyKey = $response['response']['companies'][0]['id'];
    }

    public function test_carregar()
    {
        $response = $this->companyApi->carregar(self::$companyKey);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

}