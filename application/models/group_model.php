<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Group_model extends CI_Model
{
    private $table_name = 'group';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        if (isset($data['id']) and $data['id']) {
            $this->db->where('id', $data['id']);
            $this->db->update($this->table_name, $data);

            return $data['id'];
        } else {
            $this->db->insert($this->table_name, $data);

            return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
        }
    }

    public function assign($user_id, $group_id)
    {
        $this->db->select('*');
        $this->db->from('user_group');
        $this->db->where('user_id', $user_id);
        $this->db->where('group_id', $group_id);
        $query = $this->db->get();
        $result = $query->result_array();
        //print_r($result);
        $checked = false;
        if ($result) {
            $this->db->where('user_id', $user_id);
            $this->db->where('group_id', $group_id);
            $this->db->delete('user_group');
        } else {
            $data = array();
            $data['user_id'] = $user_id;
            $data['group_id'] = $group_id;
            $this->db->insert('user_group', $data);
            $checked = true;
        }

        return $checked;
    }
    public function load_groups()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function load_group($id)
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
