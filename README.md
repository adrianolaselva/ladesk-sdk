
[![version][packagist-badge]][packagist]
[packagist-badge]: https://img.shields.io/packagist/v/adrianolaselva/ladesk-sdk.svg
[packagist]: https://packagist.org/packages/adrianolaselva/ladesk-sdk
[![Build Status](https://travis-ci.org/adrianolaselva/ladesk-sdk.svg?branch=master)](https://travis-ci.org/adrianolaselva/ladesk-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/adrianolaselva/ladesk-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/adrianolaselva/ladesk-sdk/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/adrianolaselva/ladesk-sdk/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/adrianolaselva/ladesk-sdk/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/adrianolaselva/ladesk-sdk/badges/build.png?b=master)](https://scrutinizer-ci.com/g/adrianolaselva/ladesk-sdk/build-status/master)

[![Total Downloads](https://poser.pugx.org/adrianolaselva/ladesk-sdk/downloads)](https://packagist.org/packages/adrianolaselva/ladesk-sdk)
[![Monthly Downloads](https://poser.pugx.org/adrianolaselva/ladesk-sdk/d/monthly)](https://packagist.org/packages/adrianolaselva/ladesk-sdk)
[![Daily Downloads](https://poser.pugx.org/adrianolaselva/ladesk-sdk/d/daily)](https://packagist.org/packages/adrianolaselva/ladesk-sdk)

[![License](https://poser.pugx.org/adrianolaselva/ladesk-sdk/license)](https://packagist.org/packages/adrianolaselva/ladesk-sdk)

## Componente de integração com API de LaDesk plataforma

Este Projeto tem por finalidade prover uma integração menos traumática e padronizada com as API's 
do LaDesk


### Descrição

Para iniciar o uso os seguintes passos devem ser executados

    * Passar como parâmetro no construtor em forma de array.

```php
$this->client = new \Integracao\LaDesk\Client([
    LaDeskParameterConst::LADESK_HOST => "http://...",
    LaDeskParameterConst::LADESK_TIMEOUT => 10,
    LaDeskParameterConst::LADESK_KEY => "",
]);

$vendaApi = new VendaAPI($client);
```

    * Passar como parâmetro a partir de uma instância do Client.

```php
$client = new \Integracao\LaDesk\Client();

$client->setParameter(LaDeskParameterConst::LADESK_HOST, "http://...");
$client->setParameter(LaDeskParameterConst::LADESK_TIMEOUT, 10);
$client->setParameter(LaDeskParameterConst::LADESK_KEY, "");

$vendaApi = new VendaAPI($client);
```

### Parâmetros

    LaDeskParameterConst::LADESK_HOST => URL das apis do controlPay
    LaDeskParameterConst::LADESK_TIMEOUT => Tempo de Timeout da requisição, como padrão o tempo é de 20 segundos
    LaDeskParameterConst::LADESK_KEY => Chave de acesso ao controlPay

Obs: Caso seja adicionado a "LADESK_KEY" no parâmetro, não será necessário os parâmetros "LADESK_USER" e 
"LADESK_PWD", pois os mesmos são utilizados para gerar uma key para efetuar as requisições


Para obter a versão configure seu composer.json conforme exemplo abaixo:

```json
{
    "name": "ladesk/composer-consumer",
    "authors": [
        {
            "name": "Adriano M. La Selva",
            "email": "adrianolaselva@gmail.com"
        }
    ],
    "require": {
        "adrianolaselva/ladesk-sdk": "0.1.*"
    },
	"prefer-stable" : true
}
```

Certifique-se que as configurações foram preenchidas corretamente executando os testes presentes no diretório "/vendor/adrianolaselva/ladesk-sdk/tests/*"

```sh
phpunit
```

[GitHub]: <https://github.com/adrianolaselva/ladesk-sdk.git>