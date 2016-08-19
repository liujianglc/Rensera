<?php

defined('BASEPATH') or exit('No direct script access allowed');

class template extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('template_model', 'tm');
    }

    public function index()
    {
        $result = $this->tm->load_templates();
        $this->stencil->data('list', $result);
        $this->stencil->paint('template/index_view');
    }

    public function create($id = 0)
    {
        $this->form_validation->set_rules('name', 'Template Name', 'trim|required');
        $this->form_validation->set_rules('name', 'Template Name', 'callback_name_check');
        $data['errors'] = array();
        if ($id) {
            $template = $this->tm->get_template($id);
            $this->stencil->data('template', $template);
        }
        if ($this->form_validation->run()) {
            $data = array();
            $data['id'] = $this->input->post('id');
            $data['name'] = $this->input->post('name');
            $this->tm->create($data);
            redirect('/template/index');
        }
        $this->stencil->paint('template/create_view');
    }

    public function name_check($name)
    {
        $id = $this->input->post('id');
        $exist = $this->tm->check_name($name, $id);
        if ($exist) {
            $this->form_validation->set_message('name_check', 'The template name existed.');

            return false;
        } else {
            return true;
        }
    }

    public function edit($id)
    {
        $this->stencil->paint('template/edit_view');
    }

    public function remove($id)
    {
        $this->tm->delete($id);
        redirect('/template/create');
    }

    public function upload()
    {
        $this->stencil->paint('template/upload_view');
    }
}
