<?php

namespace CosmosApp\SbifApiBundle;

/**
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 * @author Eriksen Costa <eriksencosta@gmail.com>
 */
class SbifApiBundle extends Bundle
{
    const ZONE_ATTRIBUTE = '_fos_rest_zone';

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new SerializerConfigurationPass());
        $container->addCompilerPass(new ConfigurationCheckPass());
        $container->addCompilerPass(new FormatListenerRulesPass());
        $container->addCompilerPass(new TwigExceptionPass());
        $container->addCompilerPass(new JMSHandlersPass(), PassConfig::TYPE_REMOVE);
    }
}
