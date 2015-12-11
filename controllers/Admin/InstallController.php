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

use CoreShop\Plugin;
use CoreShop\Tool;
use CoreShop\Model\Currency;


use Pimcore\Controller\Action\Admin;

class CoreShop_Admin_InstallController extends Admin
{
    public function installAction()
    {
        try
        {
            $install = new Plugin\Install();

            PLugin::getEventManager()->trigger('install.pre', null, array("installer" => $install));

            $install->executeSQL("v-0.1");

            $countryTaxClass = $install->createClass("CoreShopCountryTax");

            $fcSpecificAddress = $install->createFieldCollection("CoreShopProductSpecificPrice");
            $fcUserAddress = $install->createFieldcollection('CoreShopUserAddress');

            // create object classes
            $orerStateClass = $install->createClass("CoreShopOrderState");
            $categoryClass = $install->createClass('CoreShopCategory');
            $productClass = $install->createClass('CoreShopProduct');
            $cartClass = $install->createClass('CoreShopCart');
            $cartItemClass = $install->createClass('CoreShopCartItem');
            $userClass = $install->createClass("CoreShopUser");

            $orderItemClass = $install->createClass("CoreShopOrderItem");
            $paymentClass = $install->createClass("CoreShopPayment");
            $orderClass = $install->createClass("CoreShopOrder");

            // create root object folder with subfolders
            $coreShopFolder = $install->createFolders();
            // create custom view for blog objects
            $install->createCustomView($coreShopFolder, array(
                $productClass->getId(),
                $categoryClass->getId(),
                $cartClass->getId(),
                $cartItemClass->getId(),
                $userClass->getId(),
                $orderItemClass->getId(),
                $orderClass->getId(),
                $paymentClass->getId(),
                $countryTaxClass->getId(),
                //$cartRule->getId(),
                $orerStateClass->getId()
            ));
            // create static routes
            $install->createStaticRoutes();
            // create predefined document types
            //$install->createDocTypes();

            $install->createClassmap();
            $install->createImageThumbnails();

            Plugin::getEventManager()->trigger('install.post', null, array("installer" => $install));

            $install->setConfigInstalled();

            $success = true;
        }
        catch(Exception $e)
        {
            \Logger::crit($e);

            $success = false;
        }

        $this->_helper->json(array("success" => $success));
    }
}