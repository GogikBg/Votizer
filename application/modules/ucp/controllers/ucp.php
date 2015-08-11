a<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ucp extends MX_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{			
		if(!$this->session->userdata('activity'))
        {
            $userId = $this->session->userdata('id');
            $site = $this->sites->getSiteByUserId($userId);
            $user = $this->users->getUserById($userId);
			
            if(empty($site) || empty($user))
			{
                show_404();
            }
			else
			{
                $userData = array(
                    'username' => $user->username,
                    'name' => $user->name,
                    'surname' => $user->l_name,
                    'email' => $user->email
                );
				
                $siteData = array(
                    'url' => $site->url,
                    'title' => $site->title,
                    'description' => $site->description,
                    'category' => $site->category_id
                );
			
				$navigation = $this->general->getHeaderNavigation();
				$sidebar = $this->general->getAdvertisements(0);
				$featured = $this->sites->getFeaturedData();
				
				$data = array(
					'navigation' => $navigation,
					'sidebar' => $sidebar,
					'featured' => $featured,
					'site' => $siteData,
                    'user' => $userData
				);
		
				$this->template
					->set_layout('default')
					->set_partial('metadata', 'partials/metadata')
					->set_partial('header', 'partials/header')
					->set_partial('sidebar', 'partials/sidebar')
					->set_partial('featured', 'partials/featured')
					->set_partial('footer', 'partials/footer')
					->title('IgnitionCMS | UCP')
				->build('ucp', $data);
			}
		}
		else
		{
			redirect('home');
		}
	}
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */