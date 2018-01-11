<?php

/*
 * This file is part of the SbifApiBundle package.
 *
 * (c) Cosmos App <https://github.com/cosmos-app>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle;

use CosmosApp\SbifApiBundle\DependencyInjection\SbifApiExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class SbifApiBundle extends Bundle
{
    /**
     * @return SbifApiExtension
     */
    public function getContainerExtension()
    {
        return new SbifApiExtension();
    }
}
