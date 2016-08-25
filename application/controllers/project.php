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
            $this->cm->create($data);
            //print_r($data);
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
            $id = $this->pm->create($data);

            $config = array();
            $config['upload_path'] = './uploads/project/';
            $config['allowed_types'] = 'png|gif|jpg';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);

            $have_upload_error = false;
            if (!$this->upload->do_upload('thumbnail')) {
                $error = $this->upload->display_errors();
                $have_upload_error = true;
            } else {
                $upload_data = $this->upload->data();
                //print_r($upload_data);

                $data = array();
                $data['id'] = $id;
                $root = str_replace('\\', '/', FCPATH);
                $data['thumbnail'] = str_replace($root, '/', $upload_data['full_path']);
                $this->pm->create($data);
            }
            //if (!$have_upload_error) {
                redirect('/project/index');
            //}
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

    public function index($sort_by = 'desc', $cate_ids = false)
    {
        $category_ids = array();
        if ($cate_ids) {
            $category_ids = explode('_', $cate_ids);
        }
        $this->stencil->data('category_ids', $category_ids);
        $this->stencil->data('sort_by', $sort_by);

        $categories = $this->cm->load_categories();
        $this->stencil->data('categories', $categories);

        $projects = $this->pm->load_projects($sort_by, $category_ids);
        $this->stencil->data('projects', $projects);
        $this->stencil->paint('project/my_view');
    }
}
