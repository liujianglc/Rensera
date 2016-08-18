<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Users extends CI_Model
{
    private $table_name = 'user';
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $ci =& get_instance();
    }

    function register($data) {
        $this->db->insert($this->table_name, $data);
    }
    /**
     * Get user record by Id
     *
     * @param	int
     * @param	bool
     * @return	object
     */
    function get_user_by_id($user_id, $activated=TRUE)
    {
        $this->db->where('id', $user_id);
        $this->db->where('status', $activated ? 1 : 0);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() == 1)
            return $query->row();
        return NULL;
    }

    function get_user_name_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get($this->table_name);
        $result = $query->row_array();
        return $result['name'];
    }

    function get_user_by_email($email, $activated) {
        $this->db->where('email', $email);
        $this->db->where('status', $activated ? 1 : 0);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() == 1)
            return $query->row();
        return NULL;
    }
    /**
     * Update user login info, such as IP-address or login time, and
     * clear previously generated (but not activated) passwords.
     *
     * @param	int
     * @param	bool
     * @param	bool
     * @return	void
     */
    function update_login_info($userid, $record_ip, $record_time, $status=null)
    {
        //$this->db->set('new_password_key', NULL);
        //$this->db->set('new_password_requested', NULL);
        if ($record_ip)
            $this->db->set('last_ip', $this->input->ip_address());
        if ($record_time)
            $this->db->set('last_login_at', date('Y-m-d H:i:s'));
        if (isset($status))
            $this->db->set('is_online', $status);
        $this->db->where('id', $userid);
        $this->db->update($this->table_name);
    }
    function get_user_info_by_id($user_id)
    {
        $this->db->where('id', $user_id);
        $query  = $this->db->get($this->table_name);
        $result = $query->row_array();
        return $result;
    }

}