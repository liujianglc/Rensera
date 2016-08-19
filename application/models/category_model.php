<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Category_model extends CI_Model
{
    private $table_name = 'category';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function create_category($data)
    {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update($this->table_name, $data);

            return $data['id'];
        } else {
            $this->db->insert($this->table_name, $data);

            return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
        }
    }

    public function check_name($name, $id = false)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('name', $name);
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $query = $this->db->get();

        return $query->num_rows() > 0 ? true : false;
    }
    public function load_categories()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function load_category($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }
}
