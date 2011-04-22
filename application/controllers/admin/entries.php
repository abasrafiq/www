<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
  /** Entries control **/

class Entries extends CI_Controller {    
    
     public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $admin_data['allPost'] = $this->db->query('SELECT id, title, small_body, body, date FROM entries');
        $this->load->view('admin/entries/entries', $admin_data);   
        
    }
    
    public function editEntry()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
       
        $admin_data['onePost'] = $this->db->query('SELECT id, title, small_body, body, date FROM entries WHERE id = '.$this->uri->segment(4).'');
        $this->load->view('admin/entries/admin_edit_entry', $admin_data); 
    }
    
    
    public function deleteEntry()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('entries'); 
        redirect('admin/entries');
    }
    
    
    public function updateEntry()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $data_array = array('title' => $_POST['title'],'small_body' => $_POST['small_body'], 'body' => $_POST['body']);
        $this->db->where('id', $_POST['id']); 
        $this->db->update('entries', $data_array);
        redirect('admin/entries/');  
    }
    
    
    public function addPost()
    {   
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        } 
         
        $this->load->view('admin/entries/admin_add_entry'); 
    }
    
    
    public function addEntry()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $_POST['date'] = date('Y-m-d');
        $this->db->insert('entries', $_POST);
        redirect('admin/entries');
    }
    
}    
?>
