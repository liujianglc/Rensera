<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!$this->n2_auth->is_logged_in()) {
          redirect('/user/login');
      } else {
      	$this->stencil->paint('home_view');
      }
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
