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

use GuzzleHttp\Client;

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

        $uri = $date && $date->format('Ymd') !== $now->format('Ymd')
            ? $this->getUri(
                $date->format('Y'),
                $date->format('m'),
                $date->format('d')
            )
            : $this->getUri(null, null, null);

        $response = $this->get($uri);

        dump($response);
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

    private function get($uri)
    {
        $client = new Client();

        $response = $client->request('GET', $uri);
    }

    /**
     * @param string $year
     * @param string $month
     * @param string $day
     *
     * @return string
     */
    private function getUri($year = null, $month = null, $day = null)
    {
        $url = $this->getRequestUrl();
        $parameters = http_build_query($this->getRequestParameters());

        $path = '';

        if ($year) {
            $path .= $year;

            if ($month) {
                $path .= '/'.$month;

                if ($day) {
                    $path .= '/dias/'.$day;
                }
            }
        }

        return sprintf('%s/%s?%s', $url, $path, $parameters);
    }
}
