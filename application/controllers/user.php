<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array(
            'form',
            'url',
        ));
        $this->load->library('form_validation');
        $this->load->library('n2_auth');
        $this->lang->load('n2_auth');
    }

    public function index()
    {
        $this->stencil->paint('user_index_view');
    }

    public function initUsers()
    {
        $data = array();
        $data['name'] = 'Marketing Admin';
        $data['email'] = 'admin@rensera.com';
        $data['password'] = '123456';
        $data['role_id'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['status'] = 1;
        $this->n2_auth->register($data);

        $data = array();
        $data['name'] = 'Marketing Agent';
        $data['email'] = 'agent@rensera.com';
        $data['password'] = '123456';
        $data['role_id'] = 2;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['status'] = 1;
        $this->n2_auth->register($data);

        $data = array();
        $data['name'] = 'Lawyer';
        $data['email'] = 'lawyer@rensera.com';
        $data['password'] = '123456';
        $data['role_id'] = 3;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['status'] = 1;
        $this->n2_auth->register($data);
    }
    public function login()
    {
        $this->stencil->layout('home_layout');

        if ($this->n2_auth->is_logged_in()) {
            redirect('/home');
        } else {
            $this->form_validation->set_rules('userid', 'Login', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            $data['errors'] = array();

            if ($this->form_validation->run()) { // validation ok
                if ($this->n2_auth->login($this->form_validation->set_value('userid'), $this->form_validation->set_value('password'), $this->form_validation->set_value('remember'))) {
                    // success
                    redirect('/home');
                } else {
                    $errors = $this->n2_auth->get_error_message();
                    if (isset($errors['banned'])) { // banned user
                        $this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);
                    } else { // fail
                        foreach ($errors as $k => $v) {
                            $data['errors'][$k] = $this->lang->line($v);
                        }
                    }
                }
            }
            $this->stencil->slice('head');
            $this->stencil->paint('login_view');
        }
    }

    public function logout()
    {
        $this->n2_auth->logout();

        $this->_show_message($this->lang->line('auth_message_logged_out'));
    }

    public function _show_message($message)
    {
        $this->session->set_flashdata('message', $message);
        redirect('/home/index');
    }
}
