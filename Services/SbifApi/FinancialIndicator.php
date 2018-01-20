<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Services\SbifApi;

/**
 * @author Héctor Rojas <hector.d.rojas.s@gmail.com>
 */
class FinancialIndicator extends AbstractFinancialIndicator
{
    /**
     * {@inheritdoc}
     */
    public function getByDate(\DateTime $date = null)
    {
        $now = new \DateTime();

        if ($date && $date->format('Ymd') !== $now->format('Ymd')) {
            $path = $this->getPath(
                $date->format('Y'),
                $date->format('m'),
                $date->format('d')
            );

            return $this->getApiClient()->get($path);
        }

        return $this->getApiClient()->get();
    }

    /**
     * {@inheritdoc}
     */
    public function getByMonth($year, $month)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getByYear($year)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAfterDate(\DateTime $date)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAfterMonth($year, $month)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAfterYear($year)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBeforeDate(\DateTime $date)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBeforeMonth($year, $month)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBeforeYear($year)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBetweenDates(\DateTime $dateSince, \DateTime $dateUntil)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBetweenMonths($yearSince, $monthSince, $yearUntil, $monthUntil)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBetweenYears($yearSince, $yearUntil)
    {
    }
}
