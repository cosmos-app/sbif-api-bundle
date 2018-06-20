<?php

/**
 * Copyright (c) 2018 Cosmos App <https://github.com/cosmos-app>.
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace CosmosApp\SbifApiBundle\Sbif\FinancialIndicator;

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

        $path = $date && $date->format('Ymd') !== $now->format('Ymd')
            ? $this->getPath(
                $date->format('Y'),
                $date->format('m'),
                $date->format('d')
            )
            : $this->getPath();

        $response = $this->getApiClient()->get($path);

        dump($response);die;

        return [
            'value' => $response[self::$responseKey[$this->getIndicator()]][0]['Valor'],
            'date' => $response[self::$responseKey[$this->getIndicator()]][0]['Fecha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getByMonth(\DateTime $date = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getByYear(\DateTime $date = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAfterDate(\DateTime $date = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAfterMonth(\DateTime $date = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAfterYear(\DateTime $date = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBeforeDate(\DateTime $date = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBeforeMonth(\DateTime $date = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBeforeYear(\DateTime $date = null)
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
    public function getBetweenMonths(\DateTime $dateSince, \DateTime $dateUntil)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBetweenYears(\DateTime $dateSince, \DateTime $dateUntil)
    {
    }
}
