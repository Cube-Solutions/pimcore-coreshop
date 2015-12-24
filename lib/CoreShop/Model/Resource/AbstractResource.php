<?php

namespace CoreShop\Model\Resource;

use Pimcore\Model\Resource;

abstract class AbstractResource extends Resource\AbstractResource {

    protected $tableName = '';

    public function getById($id = null) {

        if ($id != null)
            $this->model->setId($id);

        $data = $this->db->fetchRow('SELECT * FROM '.$this->tableName.' WHERE id = ?', $this->model->getId());

        if(!$data["id"])
            throw new \Exception(get_class($this->model) . " with the ID " . $this->model->getId() . " doesn't exists");


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
}