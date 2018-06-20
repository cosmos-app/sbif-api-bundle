<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class SbifApiExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition('cosmos_app.sbif_api_client');
        $def->replaceArgument(0, $config['api_url']);
        $def->replaceArgument(1, $config['api_key']);
    }
}
