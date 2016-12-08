<?php

namespace Integracao\LaDesk\API;

use Integracao\LaDesk\AbstractAPI;
use Integracao\LaDesk\Client;

/**
 * Class CustomerApi
 * @package Integracao\LaDesk\API
 */
class CustomerApi extends AbstractAPI
{

    /**
     * CustomerApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('customers', $client);
    }

}