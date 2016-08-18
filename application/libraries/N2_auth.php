<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('phpass-0.1/PasswordHash.php');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

/**
 * N2_auth
 *
 * Authentication library for Code Igniter.
 *
 * @package		N2_auth
 * @author		Ilya Konyukhov (http://konyukhov.com/soft/)
 * @version		1.0.9
 * @based on	DX Auth by Dexcell (http://dexcell.shinsengumiteam.com/dx_auth)
 * @license		MIT License Copyright (c) 2008 Erick Hartanto
 */
class N2_auth
{
    private $error = array();
    
    function __construct()
    {
        $this->ci =& get_instance();
        
        $this->ci->load->config('n2_auth', TRUE);
        
        $this->ci->load->library('session');
        $this->ci->load->database();
        $this->ci->load->model('users');
        // Try to autologin
        //$this->autologin();
    }

    function register($data) {
        $hasher = new PasswordHash($this->ci->config->item('phpass_hash_strength', 'n2_auth'), $this->ci->config->item('phpass_hash_portable', 'n2_auth'));
        $data['password'] = $hasher->HashPassword($data['password']);
        $this->ci->users->register($data);
    }
    
    /**
     * Login user on the site. Return TRUE if login is successful
     * (user exists and activated, password is correct), otherwise FALSE.
     *
     * @param	string	(username or email or both depending on settings in config file)
     * @param	string
     * @param	bool
     * @return	bool
     */
    function login($login, $password, $remember)
    {
        if ((strlen($login) > 0) AND (strlen($password) > 0)) {
            $get_user_func = 'get_user_by_email';
            
            if (!is_null($user = $this->ci->users->$get_user_func($login, TRUE))) { // login ok
                //echo $user->password;
                // Does password match hash in database?
                $hasher = new PasswordHash($this->ci->config->item('phpass_hash_strength', 'n2_auth'), $this->ci->config->item('phpass_hash_portable', 'n2_auth'));
                if ($hasher->CheckPassword($password, $user->password)) { // password ok
                    //$role_id = $user->role_id;
                    //$this->ci->load->model('Roles_model');
                    //$role_name = $this->ci->Roles_model->get_role_name($role_id);
                    $this->ci->session->set_userdata(array(
                        'id' => $user->id,
                        'name' => $user->name,
                        'email'=> $user->email,
                        'role_id'=> $user->role_id,
                        'photo_url' => $user->photo_url,
                        'status' => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED
                    ));
                    
                    /*if ($remember) {
                    $this->create_autologin($user->userid);
                    }*/
                    //$this->clear_login_attempts($login);
                    
                    $this->ci->users->update_login_info($user->id, $this->ci->config->item('login_record_ip', 'n2_auth'), $this->ci->config->item('login_record_time', 'n2_auth'),1);
                    return TRUE;
                } else { // 	fail - wrong password
                    //$this->increase_login_attempt($login);
                    $this->error = array(
                        'password' => 'auth_incorrect_password'
                    );
                }
            } else { // fail - wrong login
                //$this->increase_login_attempt($login);
                $this->error = array(
                    'userid' => 'auth_incorrect_login'
                );
            }
        }
        return FALSE;
    }
    
    /**
     * Logout user from the site
     *
     * @return	void
     */
    function logout()
    {
        //$this->delete_autologin();
        $user_id = $this->get_user_id();
        $this->ci->users->update_login_info($user_id,'','',0);

        // See http://codeigniter.com/forums/viewreply/662369/ as the reason for the next line
        $this->ci->session->set_userdata(array(
            'user_id' => '',
            'username' => '',
            'status' => '',
            'email'=>'',
            'role_id'=>''
        ));
        
        $this->ci->session->sess_destroy();
    }
    
    function get_error_message()
    {
        return $this->error;
    }
    
    function is_logged_in($activated = TRUE)
    {
        return $this->ci->session->userdata('status') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
    }
    
    /**
     * Get user_id
     *
     * @return	string
     */
    function get_user_id()
    {
        return $this->ci->session->userdata('id');
    }
    
    /**
     * Get username
     *
     * @return	string
     */
    function get_username()
    {
        return $this->ci->session->userdata('name');
    }

    function get_email() {
        return $this->ci->session->userdata('email');
    }
    
    function get_role_id()
    {
        return $this->ci->session->userdata('role_id');
    }
    
    function get_user_photo()
    {
        return $this->ci->session->userdata('photo_url');
    }
}
