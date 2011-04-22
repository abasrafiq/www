<?php

/** Default front controller **/

class Pages extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->library('parser'); 
             
    }
    
    private function configuration()
    {
        return $this->db->query('SELECT site_title, slogan, keywords, description, google_analytics FROM config');    
    }
      
    
    public function show()
    {   
        if(!$this->uri->segment(3))
        {
            show_404();
        }
        
        $configuration = $this->configuration();
                                                                                   
        $pages = $this->db->query('SELECT id, url, title, body, date FROM pages');
        $content = $this->db->query('SELECT id, url, title, body, date FROM pages WHERE url = "'.$this->uri->segment(3).'"');
        
        
        $data = array(
                    'configuration' => $configuration->result_array(),
                    'content' => $content->result_array(),
                    'pages' => $pages->result_array()
        );        
            
        $template = $this->db->query('SELECT template FROM pages WHERE url = "'.$this->uri->segment(3).'"');
        $template = $template->result();
        $template = json_decode(json_encode($template), true);
        $template = $template[0]['template'];              

        
        $this->parser->parse('templates/'.$template, $data);          
    }

    
    
	
}


?>