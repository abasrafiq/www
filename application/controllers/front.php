<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');    

/** Default front controller **/

class Front extends CI_Controller {
        
    public function __construct()
    {
        parent::__construct(); 
        
        if($this->uri->segment(1) == 'admin')
        {
            redirect('admin/index');
        }
          
    }
    
    private function configuration()
    {
        return $this->db->query('SELECT site_title, slogan, keywords, description, google_analytics, onpage FROM config');    
    }
    
    
    
   
      
    
	public function index()
	{
                
        $configuration = $this->configuration();
               
        /** 
               
        $per_page = $this->db->query('SELECT onpage FROM config');
        $per_page = $per_page->result();
        $per_page = json_decode(json_encode($per_page), true);
        $per_page = $per_page[0]['onpage'];       
               
        $base_url = site_url('front/index');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $this->count_entries();
        $config['per_page'] = $per_page;
        $config['uri_segment'] = '3';
       
        $config['full_tag_open'] = 'Pages: ';
        $config['prev_link'] = 'Prev';
        $config['next_link'] = 'Next';
        
        $this->pagination->initialize($config);         
         
        $allPost = $this->get_entries($per_page, $this->uri->segment(3));
        
        **/
        
        $pages = $this->db->query('SELECT id, url, title, body, date FROM pages');   
		
        
        $pageContent = $this->db->query('SELECT id, title, body, date FROM pages WHERE `show` = "1"');
        
        
        // $pagination = $this->pagination->create_links();
               
        $data = array(
                    'configuration' => $configuration->result_array(),
                    //'allPost' =>  $allPost->result_array(),
                    'pages' => $pages->result_array(),
                    //'pagination' => $pagination
                    'content' => $pageContent->result_array()
        );
        
        $template = $this->db->query('SELECT template FROM pages WHERE `show` = 1');
        $template = $template->result();
        $template = json_decode(json_encode($template), true);
        $template = $template[0]['template'];
                
        $this->parser->parse('templates/'.$template, $data);
        
	}
    
    /**
    
    public function comments()
    {
        
        if(!$this->uri->segment(3))
        {
            show_404();
        }
        
        $configuration = $this->configuration();
        
        $content = $this->db->query('SELECT title, body, date FROM entries WHERE id = '.$this->uri->segment(3).'');
        $comments = $this->db->query('SELECT body, author, date FROM comments WHERE entry_id = '.$this->uri->segment(3).'');
        $pages = $this->db->query('SELECT id, url, title, body, date FROM pages');
        
        
        $data = array(
                    'configuration' => $configuration->result_array(),
                    'content' =>  $content->result_array(),
                    'comments' => $comments->result_array(),
                    'pages' => $pages->result_array()
        );
        
        
        if ($data['comments'])
        {
            $data['ifComments'] = "<p>Comments</p>";
        }
        else
        {
            $data['ifComments'] = "";
        }    
    
               
        $this->parser->parse('templates/comment_view.html', $data); 
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
            $_POST['date'] = date('Y-m-d');
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
      
    * 
    * 
    **/
	
}


?>