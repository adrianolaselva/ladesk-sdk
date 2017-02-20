<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/02/2017
 * Time: 11:30
 */

namespace Integracao\LaDesk\API;

use Integracao\LaDesk\AbstractAPI;
use Integracao\LaDesk\Client;

/**
 * Class DefaultApi
 * @package Integracao\LaDesk\API
 */
class DefaultApi extends AbstractAPI
{

    /**
     * DefaultApi constructor.
     */
    public function __construct($endpoint, Client $client)
    {
        parent::__construct($endpoint, $client);
    }
}