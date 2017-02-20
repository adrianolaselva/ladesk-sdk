<?php

namespace Integracao\LaDesk\API;


use Integracao\LaDesk\AbstractAPI;
use Integracao\LaDesk\Client;

/**
 * Class DepartmentApi
 * @package Integracao\LaDesk\API
 */
class DepartmentApi extends AbstractAPI
{

    /**
     * DepartmentApi constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct("departments", $client);
    }

    /**
     * @param $id
     * @return DefaultApi
     */
    public function getAgents($id)
    {
        return new DefaultApi(sprintf("departments/%s/agents", $id), $this->_client);
    }
}