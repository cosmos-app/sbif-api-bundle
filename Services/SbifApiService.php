<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services;

use CosmosApp\SbifApiBundle\Sbif\FinancialIndicator\FinancialIndicator;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class SbifApiService
{
    /**
     * @var SbifApiClientService
     */
    private $sbifApiClientService;

    /**
     * @param SbifApiClientService $sbifApiClientService
     */
    public function __construct(SbifApiClientService $sbifApiClientService)
    {
        $this->sbifApiClientService = $sbifApiClientService;
    }

    /**
     * @return FinancialIndicator
     */
    public function getUsd()
    {
        return new FinancialIndicator($this->sbifApiClientService, FinancialIndicator::USD);
    }

    /**
     * @return FinancialIndicator
     */
    public function getEur()
    {
        return new FinancialIndicator($this->sbifApiClientService, FinancialIndicator::EUR);
    }

    /**
     * @return FinancialIndicator
     */
    public function getIpc()
    {
        return new FinancialIndicator($this->sbifApiClientService, FinancialIndicator::IPC);
    }

    /**
     * @return FinancialIndicator
     */
    public function getTmc()
    {
        return new FinancialIndicator($this->sbifApiClientService, FinancialIndicator::TMC);
    }

    /**
     * @return FinancialIndicator
     */
    public function getTab()
    {
        return new FinancialIndicator($this->sbifApiClientService, FinancialIndicator::TAB);
    }

    /**
     * @return FinancialIndicator
     */
    public function getUf()
    {
        return new FinancialIndicator($this->sbifApiClientService, FinancialIndicator::UF);
    }

    /**
     * @return FinancialIndicator
     */
    public function getUtm()
    {
        return new FinancialIndicator($this->sbifApiClientService, FinancialIndicator::UTM);
    }
}
