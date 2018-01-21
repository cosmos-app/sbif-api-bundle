<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\Tests\Services;

use CosmosApp\SbifApiBundle\Services\SbifApiService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class SbifApiServiceFunctionalTest.
 */
class SbifApiServiceFunctionalTest extends KernelTestCase
{
    /**
     * @var SbifApiService
     */
    private $sbifApiService;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->sbifApiService = static::$kernel
            ->getContainer()
            ->get('cosmos_app.sbif_api');
    }

    /**
     * Test get usd by date.
     */
    public function testUsdGetByDate()
    {
        $date = new \DateTime();
        $date->modify('-4 day');

        $value = $this
            ->sbifApiService
            ->getUsd()
            ->getByDate($date);

        dump($value);
    }
}
