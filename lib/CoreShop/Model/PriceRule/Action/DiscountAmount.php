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

namespace CoreShop\Model\PriceRule\Action;

use Pimcore\Model;
use CoreShop\Tool;

/**
 * Class DiscountAmount
 * @package CoreShop\Model\PriceRule\Action
 */
class DiscountAmount extends AbstractAction {

    /**
     * @var int
     */
    public $currency;

    /**
     * @var float
     */
    public $amount;

    /**
     * @var string
     */
    public $type = "discountAmount";

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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Apply Rule to Cart
     *
     * @param Model\Object\CoreShopCart $cart
     * @return bool
     */
    public function applyRule(Model\Object\CoreShopCart $cart) {
        return true;
    }

    /**
     * Remove Rule from Cart
     *
     * @param Model\Object\CoreShopCart $cart
     * @return bool
     */
    public function unApplyRule(Model\Object\CoreShopCart $cart) {
        return true;
    }

    /**
     * Calculate discount
     *
     * @param Model\Object\CoreShopCart $cart
     * @return int
     */
    public function getDiscount(Model\Object\CoreShopCart $cart) {
        return Tool::convertToCurrency($this->getAmount(), $this->getCurrency(), Tool::getCurrency());
    }
}
