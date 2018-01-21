<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services\SbifApi;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
abstract class AbstractApiClient
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * AbstractFinancialIndicator constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = new HttpClient();
    }

    /**
     * @param string $path
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    abstract public function get($path);

    /**
     * @param string $uri
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Exception
     */
    protected function request($uri)
    {
        try {
            $response = $this->httpClient->request('GET', $uri, [
                'query' => $this->getApiParameters(),
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function getApiUri($path)
    {
        return sprintf('%s%s', $this->getApiUrl(), $path);
    }

    /**
     * @return string
     */
    private function getApiUrl()
    {
        return 'http://api.sbif.cl/api-sbifv3/recursos_api';
    }

    /**
     * @return array
     */
    private function getApiParameters()
    {
        return [
            'apikey' => $this->apiKey,
            'formato' => 'json',
        ];
    }
}
