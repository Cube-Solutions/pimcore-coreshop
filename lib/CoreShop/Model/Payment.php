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

namespace CoreShop\Model;

use Pimcore\Model\Object;

class Payment extends Base {

    /**
     * Return Payment by transaction identifier
     *
     * @param $transactionIdentification
     * @return bool
     */
    public static function findByTransactionIdentifier($transactionIdentification) {
        $list = Object\CoreShopPayment::getByTransactionIdentifier($transactionIdentification);

        $users = $list->getObjects();

        if (count($users) > 0) {
            return $users[0];
        }

        return false;
    }

    /**
     * Get Order for Payment
     *
     * @return bool|Object\AbstractObject
     */
    public function getOrder() {
        $parent = $this->getParent();

        do {
            if ($parent instanceof Object\CoreShopOrder) {
                return $parent;
            }

            $parent = $parent->getParent();
        } while ($parent != null);

        return false;
    }
}