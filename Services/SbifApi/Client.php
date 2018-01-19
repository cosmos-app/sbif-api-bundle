<?php

/*
 * This file is part of the SbifApiBundle package.
 *
 * (c) Cosmos App <https://github.com/cosmos-app>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services\SbifApi;

use GuzzleHttp\Client as HttpClient;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class Client
{
    private function get($uri)
    {
        $client = new HttpClient();

        $response = $client->request('GET', $uri);
    }

    private function get($year = null, $month = null, $day = null)
    {
        $url = $this->getRequestUrl();

        $parameters = http_build_query($this->getRequestParameters());
    }

    /**
     * @param string $year
     * @param string $month
     * @param string $day
     *
     * @return string
     */
    private
    function getUri(
        $year = null,
        $month = null,
        $day = null
    ) {
        $path = '';

        if ($year) {
            $path .= $year;

            if ($month) {
                $path .= '/'.$month;

                if ($day) {
                    $path .= '/dias/'.$day;
                }
            }
        }

        return $path;
    }


return sprintf('%s/%s?%s', $url, $path, $parameters);
}
}
