<?php

namespace Integracao\LaDesk\Factory;

use Integracao\LaDesk\Client;
use Integracao\LaDesk\Constants\LaDeskParameterConst;
use Integracao\LaDesk\Impl\KeyQueryStringAuthentication;
use Integracao\LaDesk\Interfaces\IAuthentication;

/**
 * Class AuthenticationFactory
 * @package Integracao\LaDesk
 */
class AuthenticationFactory
{
    /**
     * @param array $params
     * @return IAuthentication
     * @throws \Exception
     */
    public static function getInstance(array $params, Client $client = null)
    {
        if(!isset($params[LaDeskParameterConst::LADESK_OAUTH_TYPE]))
            throw new \Exception("Tipo de autenticação não especificado");

        switch ($params[LaDeskParameterConst::LADESK_OAUTH_TYPE])
        {
            case KeyQueryStringAuthentication::class:
                return new KeyQueryStringAuthentication($client);
                break;
        }

        throw new \Exception("Implementação não tratada no factory");
    }
}