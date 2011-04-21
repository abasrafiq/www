<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');     

/** Default front controller **/

class Front extends CI_Controller {
        
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('pagination');
    }
    
    private function configuration()
    {
        return $this->db->query('SELECT title, slogan, keywords, description, google_analytics, onpage FROM config');    
    }
    
    
    
	public function index()
	{
                
        $data['configuration'] = $this->configuration();
               
        $per_page = $this->db->query('SELECT onpage FROM config');
        $per_page = $per_page->result();
        $per_page = json_decode(json_encode($per_page), true);
        $per_page = $per_page[0]['onpage'];       
               
        $base_url = site_url('front/index');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $this->count_entries();
        $config['per_page'] = $per_page;
        $config['uri_segment'] = '3';
       
        $config['prev_link'] = 'Prev';
        $config['next_link'] = 'Next';
        
        
        
        $this->pagination->initialize($config);         
        
        //$data['allPost'] = $this->db->query('SELECT id,title, body, date FROM entries ORDER BY id DESC');
         
        $data['allPost'] = $this->get_entries($per_page, $this->uri->segment(3));

         
        $data['pages'] = $this->db->query('SELECT id, url, title, body, date FROM pages');   
		
        $this->load->view('front', $data);
        
	}
    
    public function comments()
    {
        $data['configuration'] = $this->configuration();
        
        $data['onePost'] = $this->db->query('SELECT title, body, date FROM entries WHERE id = '.$this->uri->segment(3).'');
        $data['comments'] = $this->db->query('SELECT body, author, date FROM comments WHERE entry_id = '.$this->uri->segment(3).'');
        $data['pages'] = $this->db->query('SELECT id, url, title, body, date FROM pages');
        $this->load->view('comment_view', $data);
    }
    
    
    public function submitComment()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('body', 'body', 'required');
        $this->form_validation->set_rules('author', 'author', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            echo '<a href="javascript:history.go(-1)">go back</a>';
        }
        else
        {
            $this->db->insert('comments', $_POST);
            redirect('front/comments/'.$_POST['entry_id']);
        }
    }
    
    
    function get_entries($limit = NULL, $offset = NULL)
    {
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('entries');
    }

    function count_entries()
    {
        return $this->db->count_all_results('entries');
    }  
    
	
}


?>