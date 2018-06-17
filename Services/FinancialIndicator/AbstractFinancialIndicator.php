<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services\FinancialIndicator;

use CosmosApp\SbifApiBundle\Services\ApiClient\ApiClient;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
abstract class AbstractFinancialIndicator
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
    private $indicatorKey;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * AbstractFinancialIndicator constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiClient = new ApiClient($apiKey);
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
    public function getIndicatorKey()
    {
        return $this->indicatorKey;
    }

    /**
     * @param string $indicatorKey
     *
     * @return $this
     */
    public function setIndicatorKey($indicatorKey)
    {
        $this->indicatorKey = $indicatorKey;

        return $this;
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
        $path = '/'.self::$requestUrl[$this->indicatorKey];

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

    /**
     * @return ApiClient
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    abstract public function getByDate(\DateTime $date = null);

    /**
     * @param string $year
     * @param string $month
     *
     * @return array
     */
    abstract public function getByMonth($year, $month);

    /**
     * @param string $year
     *
     * @return array
     */
    abstract public function getByYear($year);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    abstract public function getAfterDate(\DateTime $date);

    /**
     * @param string $year
     * @param string $month
     *
     * @return array
     */
    abstract public function getAfterMonth($year, $month);

    /**
     * @param string $year
     *
     * @return array
     */
    abstract public function getAfterYear($year);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    abstract public function getBeforeDate(\DateTime $date);

    /**
     * @param string $year
     * @param string $month
     *
     * @return array
     */
    abstract public function getBeforeMonth($year, $month);

    /**
     * @param string $year
     *
     * @return array
     */
    abstract public function getBeforeYear($year);

    /**
     * @param \DateTime $dateSince
     * @param \DateTime $dateUntil
     *
     * @return array
     */
    abstract public function getBetweenDates(\DateTime $dateSince, \DateTime $dateUntil);

    /**
     * @param string $yearSince
     * @param string $monthSince
     * @param string $yearUntil
     * @param string $monthUntil
     *
     * @return array
     */
    abstract public function getBetweenMonths($yearSince, $monthSince, $yearUntil, $monthUntil);

    /**
     * @param string $yearSince
     * @param string $yearUntil
     *
     * @return array
     */
    abstract public function getBetweenYears($yearSince, $yearUntil);
}
