<?php

namespace Integracao\LaDesk\API;

use Integracao\LaDesk\AbstractAPI;
use Integracao\LaDesk\Client;

/**
 * Class CompanyApi
 * @package Integracao\LaDesk\API
 */
class CompanyApi extends AbstractAPI
{

    /**
     * CustomerApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('companies', $client);
    }

}