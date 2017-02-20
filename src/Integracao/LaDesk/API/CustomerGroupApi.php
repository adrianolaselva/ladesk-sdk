<?php

namespace Integracao\LaDesk\API;


use Integracao\LaDesk\AbstractAPI;
use Integracao\LaDesk\Client;

/**
 * Class CustomerGroupApi
 * @package Integracao\LaDesk\API
 */
class CustomerGroupApi extends AbstractAPI
{

    /**
     * CustomerGroupApi constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct("customersgroups", $client);
    }
}