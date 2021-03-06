<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Register Controller

class Login extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
	
		if($this->session->userdata('activity'))
		{
			redirect('home');
		}
		else
		{			
			$data = array();
			
			$this->template
				->set_layout('default')
				->set_partial('metadata', 'partials/metadata')
				->set_partial('header', 'partials/header')
				->set_partial('sidebar', 'partials/sidebar')
				->set_partial('featured', 'partials/featured')
				->set_partial('footer', 'partials/footer')
				->title($this->config->item('site_title'), 'Login')
			->build('login', $data);
		}
	}
}

