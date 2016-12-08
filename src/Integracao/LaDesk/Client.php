<?php
namespace Integracao\LaDesk;

use Integracao\LaDesk\Constants\LaDeskParameterConst;
use Integracao\LaDesk\Factory\AuthenticationFactory;
use Integracao\LaDesk\Impl\KeyQueryStringAuthentication;
use Integracao\LaDesk\Interfaces\IAuthentication;

/**
 * Class Client
 * @package Sdk\Integracao\LaDesk
 */
class Client
{

    /**
     * @var string
     */
    const LADESK_HOST_DEFAULT = "";

    /**
     * Timeout padrão
     *
     * @var integer
     */
    const LADESK_TIMEOUT_DEFAULT = 25;

    /**
     * Timeout padrão
     *
     * @var IAuthentication
     */
    const LADESK_OAUTH_TYPE_DEFAULT = KeyQueryStringAuthentication::class;

    /**
     * Parâmetros, pré inicializado com valores padrão
     *
     * @var array
     */
    private $_params = [
        LaDeskParameterConst::LADESK_HOST => self::LADESK_HOST_DEFAULT,
        LaDeskParameterConst::LADESK_TIMEOUT => self::LADESK_TIMEOUT_DEFAULT,
        LaDeskParameterConst::LADESK_OAUTH_TYPE => self::LADESK_OAUTH_TYPE_DEFAULT
    ];

    /**
     * @var IAuthentication
     */
    private $authentication;

    /**
     * Client constructor
     *
     * $params Configurações opcionais, caso não seja passado os parâmetros será
     * acatado as presentes na raiz "/controlpay-sdk/config.ini"
     *
     * @param array[LaDeskParameterConst::{PARAM} => '', ...] $params
     * @throws \Exception
     */
    public function __construct(array $params = null, IAuthentication $authentication = null)
    {
        $this->loadParameters($params, $authentication);
    }

    /**
     * Obter parâmetro
     *
     * @param $key
     * @return mixed
     */
    public function getParameter($key)
    {
        return isset($this->_params[$key]) ? $this->_params[$key] : null;
    }

    /**
     * Adicionar Parâmetro
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function setParameter($key, $value)
    {
        $this->_params[$key] = $value;
        $this->loadParameters($this->_params, $this->authentication);
        return $this;
    }

    /**
     * Carrega parâmetros
     *
     * @param $params
     * @param IAuthentication $authentication
     * @throws \Exception
     */
    private function loadParameters($params, IAuthentication $authentication = null)
    {
        $this->_params[LaDeskParameterConst::LADESK_HOST] = getenv('LADESK_HOST');
        $this->_params[LaDeskParameterConst::LADESK_TIMEOUT] = getenv('LADESK_TIMEOUT');
        $this->_params[LaDeskParameterConst::LADESK_USER] = getenv('LADESK_USER');
        $this->_params[LaDeskParameterConst::LADESK_PWD] = getenv('LADESK_PWD');
        $this->_params[LaDeskParameterConst::LADESK_KEY] = getenv('LADESK_KEY');
        $this->_params[LaDeskParameterConst::LADESK_OAUTH_TYPE] = KeyQueryStringAuthentication::class;


        if(!is_null($params))
            foreach ($params as $key => $param)
            {
                if(!in_array($key, [
                    LaDeskParameterConst::LADESK_HOST,
                    LaDeskParameterConst::LADESK_TIMEOUT,
                    LaDeskParameterConst::LADESK_USER,
                    LaDeskParameterConst::LADESK_PWD,
                    LaDeskParameterConst::LADESK_KEY,
                    LaDeskParameterConst::LADESK_OAUTH_TYPE,
                ]))
                    throw new \Exception(sprintf("Parâmetro %s inválido", $key));
            }

        if(!is_null($params) && is_array($params))
            foreach ($params as $key => $value)
                $this->_params[$key] = $value;

        if(is_null($authentication))
        {
            $this->authentication = AuthenticationFactory::getInstance($this->_params, $this);
            return;
        }

        $this->authentication = $authentication;
    }

    /**
     * @return IAuthentication
     */
    public function getAuthentication()
    {
        return !empty($this->authentication) ? $this->authentication->getAuthorization() : null;
    }


}







