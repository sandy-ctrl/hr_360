<?php

namespace App\Models;

class Token_types_model extends Crud_model {

    protected $table = null;

    function __construct() {
        $this->table = 'ticket_types';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $ticket_types_table = $this->db->prefixTable('ticket_types');
        $where = "";
        $id = $this->_get_clean_value($options, "id");
        if ($id) {
            $where = " AND $ticket_types_table.id=$id";
        }

        $sql = "SELECT $ticket_types_table.*
        FROM $ticket_types_table
        WHERE $ticket_types_table.deleted=0 $where";
        return $this->db->query($sql);
    }

}
