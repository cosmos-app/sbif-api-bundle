<?php

/*
 * This file is part of the SbifApiBundle package.
 *
 * (c) Cosmos App <https://github.com/cosmos-app>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services\SbifApi;

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
    private $key;

    /**
     * FinancialIndicator constructor.
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
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
     * @param \DateTime|null $date
     *
     * @return []
     */
    abstract public function getByDate(\DateTime $date = null);

    /**
     * @param string $year
     * @param string $month
     *
     * @return []
     */
    abstract public function getByMonth($year, $month);

    /**
     * @param string $year
     *
     * @return []
     */
    abstract public function getByYear($year);

    /**
     * @param \DateTime|null $date
     *
     * @return []
     */
    abstract public function getAfterDate(\DateTime $date);

    /**
     * @param string $year
     * @param string $month
     *
     * @return []
     */
    abstract public function getAfterMonth($year, $month);

    /**
     * @param string $year
     *
     * @return []
     */
    abstract public function getAfterYear($year);

    /**
     * @param \DateTime|null $date
     *
     * @return []
     */
    abstract public function getBeforeDate(\DateTime $date);

    /**
     * @param string $year
     * @param string $month
     *
     * @return []
     */
    abstract public function getBeforeMonth($year, $month);

    /**
     * @param string $year
     *
     * @return []
     */
    abstract public function getBeforeYear($year);

    /**
     * @param \DateTime $dateSince
     * @param \DateTime $dateUntil
     *
     * @return mixed
     */
    abstract public function getBetweenDates(\DateTime $dateSince, \DateTime $dateUntil);

    /**
     * @param string $yearSince
     * @param string $monthSince
     * @param string $yearUntil
     * @param string $monthUntil
     *
     * @return []
     */
    abstract public function getBetweenMonths($yearSince, $monthSince, $yearUntil, $monthUntil);

    /**
     * @param string $yearSince
     * @param string $yearUntil
     *
     * @return []
     */
    abstract public function getBetweenYears($yearSince, $yearUntil);
}
