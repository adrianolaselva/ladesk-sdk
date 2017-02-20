<?php

namespace Tests\Integracao\LaDesk\API;

use Integracao\LaDesk\API\CustomerApi;
use Integracao\LaDesk\Contracts\Contact;
use Integracao\LaDesk\Contracts\Customer;
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
     * @var string
     */
    protected static $customerKey;

    /**
     * @var integer
     */
    protected static $rand;

    /**
     * @var string
     */
    protected static $groupNameAux;

    /**
     * CustomerApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_customerApi = new CustomerApi($this->client);
        self::$rand = rand(111111, 999999);
        self::$customerKey = "teste1@gmail.com";
    }

    public function test_adicionar()
    {
        $params = [
            'email' => "teste_".self::$rand."@gmail.com",
            'phone' => "(11) 98606-6232",
            'name' => "Teste_".self::$rand." lName",
            'gender' => 'M',
            'role' => 'V',
            'password' => self::$rand,
            'customfields' => json_encode([["code" => "id", "value" => self::$rand]]),
            'uniquefields' => json_encode([["code" => "phone", "value" => "(99) ".rand(11111, 99999)."-".rand(1111, 9999)]]),
            'note' => '',
            'send_registration_mail' => 'N',
        ];

        $response = $this->_customerApi->adicionar($params);

        $this->assertEquals(200, $response['http']['statusCode']);
        $this->assertEquals($params['email'], $response['response']['email']);
        $this->assertEquals(self::$rand, $response['response']['customfields'][0]['value']);
        $this->assertNotEmpty($response['response']['contactid']);

        self::$customerKey = $response['response']['contactid'];
    }

    public function test_alterar()
    {
        $params = [
            'email' => "teste_".self::$rand."@gmail.com",
            'phone' => "(11) 98606-6232",
            'name' => "Teste_Alt".self::$rand." lName",
            'gender' => 'M',
            'role' => 'V',
            'password' => self::$rand,
            'customfields' => json_encode([["code" => "id", "value" => self::$rand]]),
            'uniquefields' => json_encode([["code" => "phone", "value" => "(99) ".rand(11111, 99999)."-".rand(1111, 9999)]]),
            'note' => '',
            'send_registration_mail' => 'N',
        ];

        $response = $this->_customerApi->alterar(self::$customerKey, $params);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_addFields()
    {
        $response = $this->_customerApi->getFields(self::$customerKey)->adicionar([
            'customfields' => json_encode([["code" => "codigoteste", "value" => self::$rand]]),
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_listFields()
    {
        $response = $this->_customerApi->getFields(self::$customerKey)->filtrar([]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_listGroup()
    {
        $response = $this->_customerApi->getGroups(self::$customerKey)->filtrar([]);

        $this->assertEquals(200, $response['http']['statusCode']);

        if(isset($response['response']['groups'][0]))
            self::$groupNameAux = $response['response']['groups'][0]['groupname'];

    }

    public function test_addGroup()
    {
        if(!empty(self::$groupNameAux))
            return;

        $response = $this->_customerApi->getGroups(self::$customerKey)->adicionar([
            'name' => "VIP",
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_removeGroup()
    {
        if(empty(self::$groupNameAux))
            return;

        $response = $this->_customerApi->getGroups(self::$customerKey)->remover([
            'name' => "VIP",
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_listar()
    {
        $response = $this->_customerApi->filtrar([
            'email' => "teste",

            'limitcount' => 5,
            'limitfrom' => 0,

//            'phone' => "teste",
//            'facebook' => "teste",
//            'twitter' => "teste",
//            'weibo' => "teste",
//            'tencent' => "teste",
//            'firstname' => "teste",
//            'lastname' => "teste",
//            'companyid' => "teste",
//            'datecreatedfrom' => "teste",
//            'datecreatedto' => "teste",

        ]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_remover()
    {
        $response = $this->_customerApi->remover(self::$customerKey);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

}