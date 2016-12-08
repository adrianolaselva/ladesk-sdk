<?php

namespace Integracao\LaDesk\Impl;

use Integracao\LaDesk\Constants\LaDeskParameterConst;
use Integracao\LaDesk\Client;
use Integracao\LaDesk\Interfaces\IAuthentication;

/**
 * Class KeyQueryStringAuthentication
 * @package Integracao\LaDesk\Impl
 */
class KeyQueryStringAuthentication implements IAuthentication
{
    /**
     * @var null
     */
    private $key;

    /**
     * KeyQueryStringAuthentication constructor.
     */
    public function __construct(Client $client)
    {
        $this->key = $client->getParameter(LaDeskParameterConst::LADESK_KEY);
    }

    /**
     * @return null
     * @throws \Exception
     */
    public function getAuthorization()
    {
        if(empty($this->key))
            throw new \Exception("Chave de acesso não informada");

        return $this->key;
    }

}