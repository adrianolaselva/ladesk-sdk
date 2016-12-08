<?php
namespace Integracao\LaDesk;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use Integracao\LaDesk\Constants\LaDeskParameterConst;
use Integracao\LaDesk\Impl\KeyQueryStringAuthentication;

/**
 * Class AbstractAPI
 * @package Integracao\LaDesk
 */
abstract class AbstractAPI
{
    /**
     * @var Client
     */
    protected $_client;

    /**
     * @var GuzzleHttp\Client
     */
    protected $_httpClient;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var GuzzleHttp\Query
     */
    protected $query;

    /**
     * @var GuzzleHttp\Message\ResponseInterface
     */
    protected $response;

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json; charset=utf-8',
        'Cache-Control' => 'no-cache',
    ];

    /**
     * AbstractAPI constructor.
     * @param $endpoint
     * @param Client|null $client
     */
    protected function __construct($endpoint, Client $client = null)
    {
        $this->endpoint = $endpoint;
        $this->_client = $client;

        if(is_null($this->_client))
            $this->_client = new Client();

        $this->query = new GuzzleHttp\Query();
        $this->query->setEncodingType(false);

        switch ($this->_client->getParameter(LaDeskParameterConst::LADESK_OAUTH_TYPE))
        {
            case KeyQueryStringAuthentication::class:
                $this->query->set('apikey', $this->_client->getAuthentication());
                break;
            default:
                $this->query->set('apikey', $this->_client->getAuthentication());
                break;
        }

        $this->_httpClient = new GuzzleHttp\Client([
            'base_url' => $client->getParameter(LaDeskParameterConst::LADESK_HOST),
            'timeout' => $client->getParameter(LaDeskParameterConst::LADESK_TIMEOUT),
            'defaults' => [
                'headers' => $this->headers,
                'query' => $this->query,
                'verify' => false,
            ]
        ]);
    }

    /**
     * Adiciona parâmetros mantendo os já inicializados como padrão
     *
     * @param array $params
     * @return string
     */
    protected function addQueryAdditionalParameters(array $params)
    {
        $this->query = new GuzzleHttp\Query();

        if(isset($this->_httpClient->getDefaultOption()['query']))
            $this->query = $this->_httpClient->getDefaultOption()['query'];

        foreach ($params as $key => $value)
            $this->query->set($key, $value);

        return $this->query;
    }

    /**
     * @return GuzzleHttp\Message\ResponseInterface
     */
    public function getResponse($message = "Sucesso")
    {

        $response = [
            'status' => 0,
            'message' => $message,
            'http' => [
                'statusCode' => $this->response->getStatusCode(),
            ],
            'response' => []
        ];

        if($this->response->getBody()->getSize() == 0)
            return $response;

        $jsonResponse = $this->response->json();
        $response['response'] = isset($jsonResponse['response']) ? $jsonResponse['response'] : [];

        return $response;
    }

    /**
     * @return array
     */
    public function getQueryParameters()
    {
        return isset($this->_httpClient->getDefaultOption()['query']) ?
            $this->_httpClient->getDefaultOption()['query'] : [];
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return isset($this->_httpClient->getDefaultOption()['headers']) ?
            $this->_httpClient->getDefaultOption()['headers'] : [];
    }

    /**
     * @param RequestException $ex
     * @param string $message
     * @return array
     * @throws \Exception
     */
    protected function requestException(RequestException $ex, $message = "Falha de requisição")
    {
        if ($ex->hasResponse())
        {
            $response = [
                'status' => -1,
                'message' => $ex->getMessage(),
                'http' => [
                    'statusCode' => $ex->getResponse()->getStatusCode(),
                ],
                'response' => []
            ];

            if($ex->getResponse()->getBody()->getSize()>0){
                $jsonResponse = $ex->getResponse()->json();
                $response['response'] = isset($jsonResponse['response']) ? $jsonResponse['response'] : [];
            }

            return $response;
        }

        throw new \Exception($message, $ex->getCode(), $ex);
    }


    /**
     * @param $param
     * @return GuzzleHttp\Message\ResponseInterface
     * @throws \Exception
     */
    public function adicionar(array $param)
    {
        try{
            $this->response = $this->_httpClient->post($this->endpoint, [
                'json' => $param,
            ]);
            return $this->getResponse();
        }catch (RequestException $ex) {
            return $this->requestException($ex);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $param
     * @param $id
     * @return GuzzleHttp\Message\ResponseInterface
     * @throws \Exception
     */
    public function alterar($id, array $param)
    {
        try{
            $this->response = $this->_httpClient->put(sprintf("%s/%s", $this->endpoint, $id), [
                'json' => $param,
            ]);
            return $this->getResponse();
        }catch (RequestException $ex) {
            return $this->requestException($ex);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return GuzzleHttp\Message\ResponseInterface
     * @throws \Exception
     */
    public function carregar($id)
    {
        try{
            $this->response = $this->_httpClient->get(sprintf("%s/%s", $this->endpoint, $id));
            return $this->getResponse();
        }catch (RequestException $ex) {
            return $this->requestException($ex);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return GuzzleHttp\Message\ResponseInterface
     * @throws \Exception
     */
    public function remover($id)
    {
        try{
            $this->response = $this->_httpClient->delete(sprintf("%s/%s", $this->endpoint, $id));
            return $this->getResponse();
        }catch (RequestException $ex) {
            return $this->requestException($ex);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $param
     * @return GuzzleHttp\Message\ResponseInterface
     * @throws \Exception
     */
    public function filtrar(array $param)
    {
        try{
            $this->response = $this->_httpClient->get($this->endpoint, [
                'query' => $this->addQueryAdditionalParameters($param)
            ]);
            return $this->getResponse();
        }catch (RequestException $ex) {
            return $this->requestException($ex);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

}