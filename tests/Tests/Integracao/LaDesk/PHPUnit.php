<?php

namespace Tests\Integracao\LaDesk;

use Integracao\LaDesk\Constants\LaDeskParameterConst;
use Integracao\LaDesk\Impl\KeyQueryStringAuthentication;

/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 21/10/2016
 * Time: 08:04
 */
class PHPUnit extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Integracao\LaDesk\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $pwd;

    /**
     * @var string
     */
    protected $key;

    /**
     * PHPUnit constructor.
     */
    public function __construct()
    {
        $this->host = getenv(LaDeskParameterConst::LADESK_HOST);
        $this->key = getenv(LaDeskParameterConst::LADESK_KEY);
        $this->client = new \Integracao\LaDesk\Client([
            LaDeskParameterConst::LADESK_HOST => $this->host,
            LaDeskParameterConst::LADESK_KEY => $this->key,
            LaDeskParameterConst::LADESK_TIMEOUT => 10,
            LaDeskParameterConst::LADESK_OAUTH_TYPE => KeyQueryStringAuthentication::class,
        ]);
    }
}