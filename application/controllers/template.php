<?php

defined('BASEPATH') or exit('No direct script access allowed');

class template extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('template_model', 'tm');
        $this->load->model('template_version_model', 'tmv');
    }

    public function index($id = 0)
    {
        $result = $this->tm->load_templates();
        $this->stencil->data('list', $result);

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
            redirect('/template/create');
        }
        $this->stencil->paint('template/index_view');
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
        redirect('/template/index');
    }

    public function upload($id)
    {
        $this->stencil->data('template_id', $id);

        $result = $this->tmv->get_template_vesion($id);
        $this->stencil->data('list', $result);

        $config = array();
        $config['upload_path'] = './uploads/template/';
        $config['allowed_types'] = 'zip';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';

        $this->load->library('upload', $config);

        $have_upload_error = false;
        if (!$this->upload->do_upload('template')) {
            $error = $this->upload->display_errors();
            $have_upload_error = true;
        } else {
            $upload_data = $this->upload->data();

            $template_id = $this->input->post('template_id');
            $data = array();
            $data['template_id'] = $template_id;
            $data['version'] = $this->input->post('version');
            $root = str_replace('\\', '/', FCPATH);
            $data['file_path'] = str_replace($root, '/', $upload_data['full_path']);
            $this->tmv->create($data);

            redirect('/template/upload/'.$id);
        }

        $this->stencil->paint('template/upload_view');
    }

    public function remove_version($version_id, $template_id)
    {
        $this->tmv->delete($version_id);
        redirect('/template/upload/'.$template_id);
    }
}
