<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function create_categories() {
    	$this->stencil->paint('project/create_categories_view');
    }

    public function create() {
    	$this->stencil->paint('project/create_view');
    }

    public function assign() {

    	$this->stencil->paint('project/assign_view');
    }
}
