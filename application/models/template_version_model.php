<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Template_Version_model extends CI_Model
{
    private $table_name = 'template_version';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function create($data)
    {
        if (isset($data['id'])) {
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

    public function get_template_vesion($template_id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('template_id', $template_id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }
}
