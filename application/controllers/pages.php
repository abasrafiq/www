<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');     

/** Default pages controller **/

class Pages extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('pagination'); 
    }
    
    private function configuration()
    {
        return $this->db->query('SELECT title, slogan, keywords, description, google_analytics FROM config');    
    }
    
    
    
	public function index()
	{
        $data['configuration'] = $this->configuration();
                                       
        $data['pages'] = $this->db->query('SELECT id, url, title, body, date FROM pages');    
		$this->load->view('pages', $data);

	}
    
    public function show()
    {   
        $data['configuration'] = $this->configuration();
                                                                                   
        $data['pages'] = $this->db->query('SELECT id, url, title, body, date FROM pages');
        $data['content'] = $this->db->query('SELECT id, url, title, body, date FROM pages WHERE url = "'.$this->uri->segment(3).'"');
           
        $this->load->view('pages', $data);   
    }

    
    
	
}


?>