<?php

/*
 * This file is part of the SbifApiBundle package.
 *
 * (c) Cosmos App <https://github.com/cosmos-app>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services;

use CosmosApp\SbifApiBundle\Services\SbifApi\FinancialIndicator;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class SbifApiService
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * SbifApi constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return FinancialIndicator
     */
    public function getUsd()
    {
        return new FinancialIndicator(FinancialIndicator::USD);
    }

    /**
     * @return FinancialIndicator
     */
    public function getEur()
    {
        return new FinancialIndicator(FinancialIndicator::EUR);
    }

    /**
     * @return FinancialIndicator
     */
    public function getIpc()
    {
        return new FinancialIndicator(FinancialIndicator::IPC);
    }

    /**
     * @return FinancialIndicator
     */
    public function getTmc()
    {
        return new FinancialIndicator(FinancialIndicator::TMC);
    }

    /**
     * @return FinancialIndicator
     */
    public function getTab()
    {
        return new FinancialIndicator(FinancialIndicator::TAB);
    }

    /**
     * @return FinancialIndicator
     */
    public function getUf()
    {
        return new FinancialIndicator(FinancialIndicator::UF);
    }

    /**
     * @return FinancialIndicator
     */
    public function getUtm()
    {
        return new FinancialIndicator(FinancialIndicator::UTM);
    }
}
