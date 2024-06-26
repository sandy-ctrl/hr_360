<?php

namespace App\Models;

class Arrangement_items_model extends Crud_model {

    protected $table = null;

    function __construct() {
        $this->table = 'order_items';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $order_items_table = $this->db->prefixTable('order_items');
        $items_table = $this->db->prefixTable('items');
        $clients_table = $this->db->prefixTable('clients');
        $users_table = $this->db->prefixTable('users');

        $where = "";
        $id = $this->_get_clean_value($options, "id");
        if ($id) {
            $where .= " AND $order_items_table.id=$id";
        }

        $created_by = $this->_get_clean_value($options, "created_by");
        $created_by_hash = $this->_get_clean_value($options, "created_by_hash");
        $created_by_where = "";
        if ($created_by) {
            $created_by_where = " AND $order_items_table.created_by=$created_by ";
        } else if ($created_by_hash) {
            $created_by_where = " AND $order_items_table.created_by_hash='$created_by_hash' ";
        }

        if ($created_by && $created_by_hash) {
            $created_by_where = " AND ($order_items_table.created_by=$created_by OR $order_items_table.created_by_hash='$created_by_hash') ";
        }

        $where .= $created_by_where;

        $order_id = $this->_get_clean_value($options, "order_id");
        if ($order_id) {
            $where .= " AND $order_items_table.order_id=$order_id";
        }

        $processing = $this->_get_clean_value($options, "processing");
        if ($processing && ($created_by || $created_by_hash)) {
            $where .= " AND $order_items_table.order_id=0";
        }

        $sql = "SELECT $order_items_table.*, $items_table.files,
            (SELECT $clients_table.currency_symbol FROM $clients_table WHERE $clients_table.id=(SELECT $users_table.client_id FROM $users_table WHERE $users_table.id=$order_items_table.created_by) limit 1) AS currency_symbol
        FROM $order_items_table
        LEFT JOIN $items_table ON $items_table.id=$order_items_table.item_id
        WHERE $order_items_table.deleted=0 $where
        ORDER BY $order_items_table.id ASC";
        return $this->db->query($sql);
    }

}
