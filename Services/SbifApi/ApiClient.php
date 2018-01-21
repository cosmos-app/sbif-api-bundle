<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services\SbifApi;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class ApiClient extends AbstractApiClient
{
    /**
     * {@inheritdoc}
     */
    public function get($path)
    {
        $uri = $this->getApiUri($path);

        return $this->request($uri);
    }
}
