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
			$navigation = $this->general->getHeaderNavigation();
			$sidebar = $this->general->getAdvertisements(0);
			$featured = $this->sites->getFeaturedData();
			
			$data = array(
				'navigation' => $navigation,
				'sidebar' => $sidebar,
				'featured' => $featured
			);
			
			$this->template
				->set_layout('default')
				->set_partial('metadata', 'partials/metadata')
				->set_partial('header', 'partials/header')
				->set_partial('sidebar', 'partials/sidebar')
				->set_partial('featured', 'partials/featured')
				->set_partial('footer', 'partials/footer')
				->title('IgnitionCMS | Register')
			->build('login', $data);
		}
	}
}

