<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Sbif\ApiClient;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
abstract class AbstractApiClient implements ApiClientInterface
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * {@inheritdoc}
     */
    public function __construct($apiUrl, $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->httpClient = new HttpClient();
    }

    /**
     * {@inheritdoc}
     */
    public function get($path)
    {
        return $this->request($path);
    }

    /**
     * @param string $path
     *
     * @return array|ResponseInterface
     */
    private function request($path)
    {
        $uri = $this->getApiUri($path);

        try {
            $response = $this->httpClient->request('GET', $uri, [
                'query' => $this->getApiParameters(),
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $exception) {
            return ['error' => $exception->getMessage()];
        } catch (GuzzleException $exception) {
            return ['error' => $exception->getMessage()];
        } catch (\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private function getApiUri($path)
    {
        return sprintf('%s%s', $this->apiUrl, $path);
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
