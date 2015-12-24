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
use CoreShop\Tool;

class Amount extends AbstractCondition {

    /**
     * @var int
     */
    public $currency;

    /**
     * @var float
     */
    public $minAmount;

    /**
     * @var string
     */
    public $type = "amount";

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency_id
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getMinAmount()
    {
        return $this->minAmount;
    }

    /**
     * @param float $minAmount
     */
    public function setMinAmount($minAmount)
    {
        $this->minAmount = $minAmount;
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
        //Check Cart Amount
        if($this->getMinAmount() > 0)
        {
            $minAmount = $this->getMinAmount();
            $minAmount = Tool::convertToCurrency($minAmount, $this->getCurrency(), Tool::getCurrency());

            $cartTotal = $cart->getSubtotal();

            if($minAmount > $cartTotal)
                if($throwException) throw new \Exception("You have not reached the minimum amount required to use this voucher"); else return false;
        }

        return true;
    }
}
