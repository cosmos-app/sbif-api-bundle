<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services;

use CosmosApp\SbifApiBundle\Services\FinancialIndicator\FinancialIndicator;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class SbifApiService
{
    /**
     * @var FinancialIndicator
     */
    private $financialIndicator;

    /**
     * SbifApi constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->financialIndicator = new FinancialIndicator($apiKey);
    }

    /**
     * @return FinancialIndicator
     */
    public function getUsd()
    {
        return $this->financialIndicator->setIndicatorKey(FinancialIndicator::USD);
    }

    /**
     * @return FinancialIndicator
     */
    public function getEur()
    {
        return $this->financialIndicator->setIndicatorKey(FinancialIndicator::EUR);
    }

    /**
     * @return FinancialIndicator
     */
    public function getIpc()
    {
        return $this->financialIndicator->setIndicatorKey(FinancialIndicator::IPC);
    }

    /**
     * @return FinancialIndicator
     */
    public function getTmc()
    {
        return $this->financialIndicator->setIndicatorKey(FinancialIndicator::TMC);
    }

    /**
     * @return FinancialIndicator
     */
    public function getTab()
    {
        return $this->financialIndicator->setIndicatorKey(FinancialIndicator::TAB);
    }

    /**
     * @return FinancialIndicator
     */
    public function getUf()
    {
        return $this->financialIndicator->setIndicatorKey(FinancialIndicator::UF);
    }

    /**
     * @return FinancialIndicator
     */
    public function getUtm()
    {
        return $this->financialIndicator->setIndicatorKey(FinancialIndicator::UTM);
    }
}
