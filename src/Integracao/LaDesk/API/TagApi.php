<?php

namespace Integracao\LaDesk\API;

use Integracao\LaDesk\AbstractAPI;
use Integracao\LaDesk\Client;

/**
 * Class TagApi
 * @package Integracao\LaDesk\API
 */
class TagApi extends AbstractAPI
{

    /**
     * TagApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('tags', $client);
    }

}