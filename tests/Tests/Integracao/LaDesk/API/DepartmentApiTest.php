<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/02/2017
 * Time: 11:49
 */

namespace Tests\Integracao\LaDesk\API;
use Integracao\LaDesk\API\CustomerGroupApi;
use Integracao\LaDesk\API\DepartmentApi;
use Tests\Integracao\LaDesk\PHPUnit;

/**
 * Class DepartmentApiTest
 * @package Tests\Integracao\LaDesk\API
 */
class DepartmentApiTest extends PHPUnit
{
    /**
     * @var DepartmentApi
     */
    private $department;

    protected static $departmentKey;

    /**
     * DepartmentApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->department = new DepartmentApi($this->client);
    }

    public function test_filtrar()
    {
        $response = $this->department->filtrar([]);

        $this->assertEquals(200, $response['http']['statusCode']);

        if(isset($response['response']['departments'][0]['departmentid']))
            self::$departmentKey = $response['response']['departments'][0]['departmentid'];

    }

    public function test_carregar()
    {
        $response = $this->department->carregar(self::$departmentKey);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_listAgents()
    {
        $response = $this->department->getAgents(self::$departmentKey)->filtrar([]);

        $this->assertEquals(200, $response['http']['statusCode']);
        $this->assertNotEmpty($response['response']['agents']);
    }

}