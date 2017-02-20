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

    public function getFields($id)
    {
        return new DefaultApi(sprintf("customers/%s/fields", $id), $this->_client);
    }

    public function getGroups($id)
    {
        return new DefaultApi(sprintf("customers/%s/groups", $id), $this->_client);
    }

}