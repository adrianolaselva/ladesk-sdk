<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/02/2017
 * Time: 12:12
 */

namespace Tests\Integracao\LaDesk\API;

use Integracao\LaDesk\API\TagApi;
use Tests\Integracao\LaDesk\PHPUnit;

/**
 * Class TagApiTest
 * @package Tests\Integracao\LaDesk\API
 */
class TagApiTest extends PHPUnit
{
    /**
     * @var TagApi
     */
    private $tag;

    /**
     * @var string
     */
    private static $tagKey;

    /**
     * TagApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tag = new TagApi($this->client);
    }

    public function test_adicionar()
    {
        $response = $this->tag->adicionar([
            'name' => 'TEST_SDK'
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);

        self::$tagKey = $response['response']['id'];
    }

    public function test_alterar()
    {
        $response = $this->tag->alterar(self::$tagKey,[
            'name' => 'TEST_SDK_ALT'
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_carregar()
    {
        $response = $this->tag->carregar(self::$tagKey);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_filtrar()
    {
        $response = $this->tag->filtrar([
            'name' => 'TEST_SDK_ALT'
        ]);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

    public function test_remover()
    {
        $response = $this->tag->remover(self::$tagKey);

        $this->assertEquals(200, $response['http']['statusCode']);
    }

}