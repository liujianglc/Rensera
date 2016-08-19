<?php

defined('BASEPATH') or exit('No direct script access allowed');

class project extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Category_model', 'cm');
        $this->load->model('Project_model', 'pm');
        $this->load->model('Template_model', 'tm');
    }

    public function create_categories($id = 0)
    {
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_name', 'Category Name', 'callback_category_name_check');
        $data['errors'] = array();

        $result = $this->cm->load_categories();
        $this->stencil->data('categories', $result);

        if ($id) {
            $category = $this->cm->load_category($id);
            $this->stencil->data('category', $category);
        }
        if ($this->form_validation->run()) {
            $data = array();
            $data['id'] = $this->input->post('id');
            $data['name'] = $this->input->post('category_name');
            $this->cm->create_category($data);
            redirect('/project/create_categories');
        }
        $this->stencil->paint('project/create_categories_view');
    }

    public function category_name_check($name)
    {
        $id = $this->input->post('id');
        $exist = $this->cm->check_name($name, $id);
        if ($exist) {
            $this->form_validation->set_message('category_name_check', 'The category name existed.');

            return false;
        } else {
            return true;
        }
    }

    public function remove_category($id)
    {
        $this->cm->delete($id);
        redirect('/project/create_categories');
    }

    public function create($id = false)
    {
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('template', 'Template', 'trim|required');
        $this->form_validation->set_rules('name', 'Project Name', 'callback_name_check');

        $categories = $this->cm->load_categories();
        $this->stencil->data('categories', $categories);

        $templates = $this->tm->load_templates();
        $this->stencil->data('templates', $templates);

        if ($id) {
            $project = $this->pm->load_project($id);
            $this->stencil->data('project', $project);
        }
        if ($this->form_validation->run()) {
            $data = array();
            $data['id'] = $this->input->post('id');
            $data['name'] = $this->input->post('name');
            $data['category_id'] = $this->input->post('category');
            $data['template_id'] = $this->input->post('template');
            $this->pm->create($data);
            redirect('/project/my');
        }
        $this->stencil->paint('project/create_view');
    }

    public function name_check($name)
    {
        $id = $this->input->post('id');
        $exist = $this->pm->check_name($name, $id);
        if ($exist) {
            $this->form_validation->set_message('name_check', 'The project name existed.');

            return false;
        } else {
            return true;
        }
    }

    public function assign()
    {
        $this->stencil->paint('project/assign_view');
    }

    public function my()
    {
        $categories = $this->cm->load_categories();
        $this->stencil->data('categories', $categories);

        $projects = $this->pm->load_projects();
        $this->stencil->data('projects', $projects);
        $this->stencil->paint('project/my_view');
    }
}
