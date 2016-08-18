<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
    	  $this->stencil->paint('template/index_view');
    }

    public function create() {
    	  $this->stencil->paint('template/create_view');
    }

    public function edit() {
    	  $this->stencil->paint('template/edit_view');
    }
}
