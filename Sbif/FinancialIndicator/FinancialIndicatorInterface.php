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
interface FinancialIndicatorInterface
{
    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getByDate(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getByMonth(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getByYear(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getAfterDate(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getAfterMonth(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getAfterYear(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getBeforeDate(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getBeforeMonth(\DateTime $date = null);

    /**
     * @param \DateTime|null $date
     *
     * @return array
     */
    public function getBeforeYear(\DateTime $date = null);

    /**
     * @param \DateTime $dateSince
     * @param \DateTime $dateUntil
     *
     * @return array
     */
    public function getBetweenDates(\DateTime $dateSince, \DateTime $dateUntil);

    /**
     * @param \DateTime $dateSince
     * @param \DateTime $dateUntil
     *
     * @return array
     */
    public function getBetweenMonths(\DateTime $dateSince, \DateTime $dateUntil);

    /**
     * @param \DateTime $dateSince
     * @param \DateTime $dateUntil
     *
     * @return array
     */
    public function getBetweenYears(\DateTime $dateSince, \DateTime $dateUntil);
}
