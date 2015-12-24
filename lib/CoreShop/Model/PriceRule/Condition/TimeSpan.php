<?php
/**
 * CoreShop
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.coreshop.org/license
 *
 * @copyright  Copyright (c) 2015 Dominik Pfaffenbauer (http://dominik.pfaffenbauer.at)
 * @license    http://www.coreshop.org/license     New BSD License
 */

namespace CoreShop\Model\PriceRule\Condition;

use CoreShop\Model\PriceRule;
use CoreShop\Model\Cart;
use Pimcore\Model;

class TimeSpan extends AbstractCondition {

    /**
     * @var int
     */
    public $dateFrom;

    /**
     * @var float
     */
    public $dateTo;

    /**
     * @var string
     */
    public $type = "timeSpan";

    /**
     * @return int
     */
    public function getDateFrom()
    {
        if(!$this->dateFrom instanceof \Zend_Date)
            $this->dateFrom = new \Zend_Date($this->dateFrom / 1000);

        return $this->dateFrom;
    }

    /**
     * @param int $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @return float
     */
    public function getDateTo()
    {
        if(!$this->dateTo instanceof \Zend_Date)
            $this->dateTo = new \Zend_Date($this->dateTo / 1000);

        return $this->dateTo;
    }

    /**
     * @param float $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
    }

    /**
     * Check if Cart is Valid for Condition
     *
     * @param Cart $cart
     * @param PriceRule $priceRule
     * @param bool|false $throwException
     * @return bool
     * @throws \Exception
     */
    public function checkCondition(Cart $cart, PriceRule $priceRule, $throwException = false)
    {
        //Check Availability
        $date = \Zend_Date::now();

        if($this->getDateFrom() instanceof \Zend_Date) {
            if ($date->get(\Zend_Date::TIMESTAMP) < $this->getDateFrom()->get(\Zend_Date::TIMESTAMP)) {
                if($throwException) throw new \Exception("This voucher has expired"); else return false;
            }
        }

        if($this->getDateTo() instanceof \Zend_Date) {
            if ($date->get(\Zend_Date::TIMESTAMP) > $this->getDateTo()->get(\Zend_Date::TIMESTAMP)) {
                if($throwException) throw new \Exception("This voucher has expired"); else return false;
            }
        }

        return true;
    }
}
