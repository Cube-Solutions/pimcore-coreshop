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

use CoreShop\Controller\Action;
use CoreShop\Tool;
use CoreShop\Plugin;
use CoreShop\Exception;
use CoreShop\Model\Country;

use Pimcore\Model\Object\CoreShopUser;
use Pimcore\Model\Object\CoreShopCart;
use Pimcore\Model\Object\Fieldcollection\Data\CoreShopUserAddress;
use Pimcore\Model\Object;

class CoreShop_UserController extends Action 
{
    public function preDispatch() {
        parent::preDispatch();

        if($this->getParam("action") != "login" && $this->getParam("action") != "register") {
            if (!$this->session->user instanceof CoreShopUser) {
                $this->_redirect($this->view->url(array("lang" => $this->language), "coreshop_index"));
                exit;
            }
        }
    }
    
    public function indexAction() {
        
    }

    public function profileAction() {

    }

    public function ordersAction() {

    }

    public function settingsAction() {
        $this->view->success = false;

        if($this->getRequest()->isPost())
        {
            try {
                $params = $this->getAllParams();

                if ($params['password']) {
                    if ($params['password'] != $params['repassword'])
                        throw new Exception("Passwords do not match!");
                }

                $this->session->user->setValues($params);
                $this->session->user->save();

                $this->view->success = true;

                if(array_key_exists("_redirect", $params))
                    $this->_redirect($params['_redirect']);
            }
            catch(Exception $ex)
            {
                $this->view->message = $ex->getMessage();
            }
        }
    }
    
    public function logoutAction() {
        $this->session->user = null;
        $this->session->cartId = null;

        $this->_redirect("/" . $this->language . "/shop");
    }

    public function loginAction() {
        $redirect = $this->getParam("_redirect", $this->view->url(array("action" => "address"), "coreshop_checkout"));
        $base = $this->getParam("_base");

        if($this->getRequest()->isPost())
        {
            $user = CoreShopUser::getUniqueByEmail($this->getParam("email"));

            if ($user instanceof CoreShopUser) {
                try {
                    $isAuthenticated = $user->authenticate($this->getParam("password"));

                    if($isAuthenticated) {
                        $this->session->user = $user;

                        if(count($this->cart->getItems()) <= 0)
                        {
                            $cart = $user->getLatestCart();

                            if($cart instanceof CoreShopCart)
                                $this->session->cartId = $cart->getId();
                        }

                        $this->_redirect($redirect);
                    }
                }
                catch (Exception $ex) {
                    $this->view->message = $this->view->translate($ex->getMessage());
                }
            }
            else
                $this->view->message = $this->view->translate("User not found");
        }

        if($base)
        {
            $this->_redirect($base);
        }
    }

    public function registerAction() {
        if($this->getRequest()->isPost())
        {
            $params = $this->getAllParams();
            
            $addressParams = array();
            $userParams = array();
            
            foreach($params as $key=>$value)
            {
                if(startsWith($key, "address_"))
                {
                    $addressKey = str_replace("address_", "", $key);
                    
                    $addressParams[$addressKey] = $value;
                }
                else
                {
                    $userParams[$key] = $value;
                }
            }

            try {
                //Check User exists
                if (CoreShopUser::getUniqueByEmail($userParams['email']) instanceof CoreShopUser) {
                    throw new \Exception("E-Mail already exists");
                }

                $folder = "/users/" . strtolower(substr($userParams['lastname'], 0, 1));

                $adresses = new Object\Fieldcollection();

                $address = new CoreShopUserAddress();
                $address->setValues($addressParams);
                $address->setCountry(Country::getById($addressParams['country']));

                $adresses->add($address);

                $user = new CoreShopUser();
                $user->setKey(Pimcore\File::getValidFilename($userParams['email']));
                $user->setPublished(true);
                $user->setParent(Pimcore\Model\Object\Service::createFolderByPath($folder));
                $user->setValues($userParams);
                $user->setAddresses($adresses);
                $user->save();

                Plugin::getEventManager()->trigger('user.postAdd', $this, array("request" => $this->getRequest(), "user" => $user));

                $this->session->user = $user;

                if (array_key_exists("_redirect", $params))
                    $this->_redirect($params['_redirect']);
            }
            catch (\Exception $ex) {
                $this->view->error = $ex->getMessage();
            }
        }
    }


    public function addressesAction() {

    }

    public function addressAction()
    {
        $this->view->redirect = $this->getParam("redirect", $this->view->url(array("lang" => $this->language, "action" => "addresses"), "coreshop_user", true));
        $update = $this->getParam("address");
        $this->view->isNew = false;

        foreach($this->session->user->getAddresses() as $address)
        {
            if($address->getName() === $update)
                $this->view->address = $address;
        }

        if(!$this->view->address instanceof CoreShopUserAddress) {
            $this->view->address = new CoreShopUserAddress();
            $this->view->isNew = true;
        }

        if($this->getRequest()->isPost())
        {
            $params = $this->getAllParams();
            
            $addressParams = array();
            
            foreach($params as $key=>$value)
            {
                if(startsWith($key, "address_"))
                {
                    $addressKey = str_replace("address_", "", $key);
                    
                    $addressParams[$addressKey] = $value;
                }
            }
            
            $adresses = $this->session->user->getAddresses();

            if(!$adresses instanceof Object\Fieldcollection)
                $adresses = new Object\Fieldcollection();

            if($update)
            {
                for($i = 0; $i < count($this->session->user->getAddresses()); $i++)
                {
                    if($this->session->user->getAddresses()->get($i)->getName() == $update)
                    {
                        //$this->session->user->getAddresses()->remove($i);
                        break;
                    }
                }
            }


            $this->view->address->setValues($addressParams);
            //TODO: Check if country exists and is valid
            $this->view->address->setCountry(Country::getById($addressParams['country']));

            if($this->view->isNew)
                $adresses->add($this->view->address);
            
            $this->session->user->save();
            
            if(array_key_exists("_redirect", $params))
                $this->_redirect($params['_redirect']);
            else
                $this->_redirect("/de/shop");
        }
    }

    public function deleteaddressAction()
    {
        $address = $this->getParam("address");
        $i = -1;

        foreach($this->session->user->getAddresses() as $a)
        {
            $i++;

            if($a->getName() === $address)
                break;
        }

        if($i >= 0)
            $this->session->user->getAddresses()->remove($i);

        $this->_redirect($this->view->url(array("lang" => $this->language, "action" => "addresses"), "coreshop_user", true));
    }
}
