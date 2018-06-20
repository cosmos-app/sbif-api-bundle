<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Sbif\ApiClient;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
interface ApiClientInterface
{
    /**
     * @param string $apiUrl
     * @param string $apiKey
     */
    public function __construct($apiUrl, $apiKey);

    /**
     * @param string $path
     */
    public function get($path);
}
