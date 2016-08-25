<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Template_model extends CI_Model
{
    private $table_name = 'template';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function check_name($name, $id = 0)
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

    public function load_templates()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function create($data)
    {
        if (isset($data['id']) and $data['id']) {
            $data['updated_at'] = date('Y-m-d H:i:s');

            $this->db->where('id', $data['id']);
            $this->db->update($this->table_name, $data);

            return $data['id'];
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert($this->table_name, $data);

            return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
        }
    }

    public function get_template($template_id)
    {
        $this->db->where('id', $template_id);
        $template = $this->db->get($this->table_name)->row_array();

        return $template;
    }

    public function update_file($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($this->table_name, $data);

        return $data['id'];
    }

    public function delete($template_id)
    {
        $this->db->where('id', $template_id);
        $this->db->delete($this->table_name);
    }
}
