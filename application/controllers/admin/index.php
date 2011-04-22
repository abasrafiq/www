<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Admin controller **/

class Index extends CI_Controller {
     
    public function __construct()
    {
        parent::__construct();        
    }
    
        
/**
* Authorisation
* 
*/

    
    function isAdmin()
    {           
        $password = md5($this->input->post('password'));   
        $this->session->set_userdata('user',$this->input->post('user'));
        $this->session->set_userdata('password', $password);    
        
        $admin = $this->db->query('SELECT login, password FROM users');
        $admin = $admin->result();
        $admin = json_decode(json_encode($admin), true);
                                             
        foreach ($admin as $key => $value)
        {    
            if (($this->session->userdata('user')=== $admin[$key]['login']) && ($this->session->userdata('password')=== $admin[$key]['password']))
            {
                return true;
            } 
        }
    }
    
    
    function login()
    {                
        $this->load->view('admin/login');
    }
    
    
    function login_check()
    {   
        if (!$this->isAdmin()){
            redirect('admin/index/login');
        }
         
        $this->form_validation->set_rules('user', 'user', 'required'); 
        $this->form_validation->set_rules('password', 'password', 'required');  
        
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            echo '<a href="javascript:history.go(-1)">go back</a>';
        }
        
        else
        {
            redirect('admin/index');                      
        }  
    }
    
    
    function logoff()
    {
        $this->session->sess_destroy();
        redirect(''); 
    }
    

/**
* maintenace
* 
*/
  
    public function index()
    {   
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
             
        $admin_data['configuration'] = $this->db->query('SELECT site_title, slogan, keywords, description, google_analytics, onpage FROM config');
        $this->load->view('admin/admin', $admin_data);
    }
   
 
    public function updateConfig()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $this->db->update('config', $_POST);
        redirect('admin/index');
    }
    
 
    
       
}

?>