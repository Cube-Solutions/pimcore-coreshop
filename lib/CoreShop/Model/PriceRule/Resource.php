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

namespace CoreShop\Model\PriceRule;

use CoreShop\Model\Resource\AbstractResource;

class Resource extends AbstractResource {

    protected $tableName = 'coreshop_pricerules';

    public function getById($id = null) {

        if ($id != null)
            $this->model->setId($id);

        $data = $this->db->fetchRow('SELECT * FROM '.$this->tableName.' WHERE id = ?', $this->model->getId());

        if(!$data["id"])
            throw new \Exception("PriceRule with the ID " . $this->model->getId() . " doesn't exists");


        $this->assignVariablesToModel($data);
    }

    public function getByCode($code = null) {
        $data = $this->db->fetchRow('SELECT * FROM '.$this->tableName.' WHERE code = ?', $code);

        if(!$data["id"])
            throw new \Exception("PriceRule with the Code " . $this->model->getCode() . " doesn't exists");

        $this->assignVariablesToModel($data);
    }

    public function save() {

        $vars = get_object_vars($this->model);

        $buffer = array();

        $validColumns = $this->getValidTableColumns($this->tableName);

        if(count($vars))
            foreach ($vars as $k => $v) {

                if(!in_array($k, $validColumns))
                    continue;

                $getter = "get" . ucfirst($k);

                if(!is_callable(array($this->model, $getter)))
                    continue;

                $value = $this->model->$getter();

                if(is_bool($value))
                    $value = (int)$value;
                if(is_array($value))
                    $value = serialize($value);

                $buffer[$k] = $value;
            }

        if($this->model->getId() !== null) {
            $this->db->update($this->tableName, $buffer, $this->db->quoteInto("id = ?", $this->model->getId()));
            return;
        }

        $this->db->insert($this->tableName, $buffer);
        $this->model->setId($this->db->lastInsertId());
    }

    public function delete() {
        $this->db->delete($this->tableName, $this->db->quoteInto("id = ?", $this->model->getId()));
    }

    protected function assignVariablesToModel($data) {
        parent::assignVariablesToModel($data);

        foreach($data as $key=>$value) {
            if($key == "actions") {
                $this->model->setActions(unserialize($value));
            }
            else if($key == "conditions") {
                $this->model->setConditions(unserialize($value));
            }
        }
    }
}