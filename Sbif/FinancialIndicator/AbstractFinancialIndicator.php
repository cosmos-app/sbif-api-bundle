<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Sbif\FinancialIndicator;

use CosmosApp\SbifApiBundle\Sbif\ApiClient\ApiClientInterface;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
abstract class AbstractFinancialIndicator implements FinancialIndicatorInterface
{
    const USD = 'usd';
    const EUR = 'eur';
    const IPC = 'ipc';
    const TMC = 'tmc';
    const TAB = 'tab';
    const UF = 'uf';
    const UTM = 'utm';

    /**
     * @var array
     */
    public static $requestUrl = array(
        self::USD => 'dolar',
        self::EUR => 'euro',
        self::IPC => 'ipc',
        self::TMC => 'tmc',
        self::TAB => 'tab',
        self::UF => 'uf',
        self::UTM => 'utm',
    );

    /**
     * @var array
     */
    public static $responseKey = array(
        self::USD => 'Dolares',
        self::EUR => 'Euros',
        self::IPC => 'IPCs',
        self::TMC => 'TMCs',
        self::TAB => 'TABs',
        self::UF => 'UFs',
        self::UTM => 'UTMs',
    );

    /**
     * @var string
     */
    private $indicator;

    /**
     * @var ApiClientInterface
     */
    private $apiClient;

    /**
     * AbstractFinancialIndicator constructor.
     *
     * @param ApiClientInterface $apiClient
     * @param string             $indicator
     */
    public function __construct(ApiClientInterface $apiClient, $indicator)
    {
        $this->apiClient = $apiClient;
        $this->indicator = $indicator;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $response = $this->getByDate();

        return (string) $response['value'];
    }

    /**
     * @return string
     */
    public function getIndicator()
    {
        return $this->indicator;
    }

    /**
     * @param string $indicator
     *
     * @return $this
     */
    public function setIndicator($indicator)
    {
        $this->indicator = $indicator;

        return $this;
    }

    /**
     * @return ApiClientInterface
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * @param string $year
     * @param string $month
     * @param string $day
     *
     * @return string
     */
    public function getPath($year = null, $month = null, $day = null)
    {
        $path = '/'.self::$requestUrl[$this->indicator];

        if ($year) {
            $path .= '/'.$year;

            if ($month) {
                $path .= '/'.$month;

                if ($day) {
                    $path .= '/dias/'.$day;
                }
            }
        }

        return $path;
    }
}
