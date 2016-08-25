<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    private $territory_id;
    private $uri_array;
    public $current_pub_month;
    public $role_id;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('n2_auth');

        $this->stencil->slice('head');
        $this->stencil->slice('header');
        if ($this->n2_auth->get_user_id()) {
            $this->stencil->data('user_id', $this->n2_auth->get_user_id());
            $this->stencil->data('username', $this->n2_auth->get_username());
            $this->stencil->data('email', $this->n2_auth->get_email());
            $this->load->model('Users');

            $this->init_nav();

            $this->stencil->slice('footer');
            $this->stencil->layout('subpage_layout');
        } else {
            if (!($this->router->class = 'user' and $this->router->method == 'login')) {
                redirect('/user/login');
            }
            //$this->stencil->layout('home_layout');
        }
    }

    public function init_nav()
    {
        $this->stencil->data('controller', $this->router->class);
        $this->stencil->data('method', $this->router->method);
        $navs = array();
        if ($this->n2_auth->get_role_id() == 1) {
            $navs[] = array('label' => 'Group Management', 'url' => '/user/group_index', 'active' => '0');
            /*$item['sub_navs'] = array();
            //$item['sub_navs'][] = array('label' => 'Manage Marketing Users', 'url' => '/user/index', 'active' => 0);
            $item['sub_navs'][] = array('label' => 'Manage Groups', 'url' => '/user/group_index', 'active' => 0);
            $item['sub_navs'][] = array('label' => 'Assign Marketing Agents to Group', 'url' => '/user/assign_group', 'active' => 0);
            $navs[] = $item;
*/
            $navs[] = array('label' => 'Template Management', 'url' => '/template/index', 'active' => '0');
            /*$item['sub_navs'] = array();
            $item['sub_navs'][] = array('label' => 'Manage Templates', 'url' => '/template/index', 'active' => 0);
            $item['sub_navs'][] = array('label' => 'Create Template', 'url' => '/template/create', 'active' => 0);
            $navs[] = $item;*/
            $navs[] = array('label' => 'Projects Management', 'url' => '/project/index', 'active' => '0');
            $item['sub_navs'] = array();
            $item['sub_navs'][] = array('label' => 'My Projects', 'url' => '/project/index', 'active' => 0);
            $item['sub_navs'][] = array('label' => 'Create Categories', 'url' => '/project/create_categories', 'active' => 0);
            //$navs[] = $item;
        } elseif ($this->n2_auth->get_role_id() == 2) {
            $navs[] = array('label' => 'My Projects Pages', 'url' => '/project/index', 'active' => '0');
        } else {
            $navs[] = array('label' => 'My Projects Pages', 'url' => '/project/index', 'active' => '0');
        }

        $this->stencil->data('navs', $navs);
    }
}
