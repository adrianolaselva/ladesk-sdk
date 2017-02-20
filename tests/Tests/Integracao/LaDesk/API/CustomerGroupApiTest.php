<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/02/2017
 * Time: 11:49
 */

namespace Tests\Integracao\LaDesk\API;
use Integracao\LaDesk\API\CustomerGroupApi;
use Tests\Integracao\LaDesk\PHPUnit;

/**
 * Class CustomerGroupApiTest
 * @package Tests\Integracao\LaDesk\API
 */
class CustomerGroupApiTest extends PHPUnit
{
    /**
     * @var CustomerGroupApi
     */
    private $customerGroup;

    protected static $customerGroudKey;

    /**
     * CustomerGroupApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->customerGroup = new CustomerGroupApi($this->client);
    }

    public function test_adicionar()
    {
        $response = $this->customerGroup->adicionar([
            'name' => 'TEST_SDK'
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);

        self::$customerGroudKey = $response['response']['id'];
    }

    public function test_alterar()
    {
        $response = $this->customerGroup->alterar(self::$customerGroudKey,[
            'name' => 'TEST_SDK_ALT'
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_carregar()
    {
        $response = $this->customerGroup->carregar(self::$customerGroudKey);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_filtrar()
    {
        $response = $this->customerGroup->filtrar([]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_remover()
    {
        $response = $this->customerGroup->remover(self::$customerGroudKey);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

}