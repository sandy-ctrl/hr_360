<?php

namespace App\Models;

class Client_groups_model extends Crud_model {

    protected $table = null;

    function __construct() {
        $this->table = 'client_groups';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $client_groups_table = $this->db->prefixTable('client_groups');
        $where = "";
        $id = $this->_get_clean_value($options, "id");
        if ($id) {
            $where = " AND $client_groups_table.id=$id";
        }

        $sql = "SELECT $client_groups_table.*
        FROM $client_groups_table
        WHERE $client_groups_table.deleted=0 $where";
        return $this->db->query($sql);
    }

    function get_id_and_title($options = array()) {
        $client_groups_table = $this->db->prefixTable('client_groups');
        $where = "";
        $id = $this->_get_clean_value($options, "id");
        if ($id) {
            $where = " AND $client_groups_table.id=$id";
        }

        $sql = "SELECT $client_groups_table.id, $client_groups_table.title
        FROM $client_groups_table
        WHERE $client_groups_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
