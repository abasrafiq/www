<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');    
  
  /** Users control **/

class Users extends CI_Controller {    
    
    public function index()
    {
        $admin_data['users'] = $this->db->query('SELECT id, login, email FROM users');
        $this->load->view('admin/users/users', $admin_data);   
        
    }
      
    public function addUser()
    {
       if (!$this->session->userdata('user')){
            redirect('admin/index/login');
       }
         
       $this->load->view('admin/users/admin_add_user');  
    }
    
    
    public function addUserForm()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');  
         
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            echo '<a href="javascript:history.go(-1)">go back</a>';
        }
        else
        {
            $data_array = array('login' => $_POST['login'],'password' => md5($_POST['password']), 'email' => $_POST['email']);
            $this->db->insert('users', $data_array);
            redirect('admin/users/');
        }
  
    }

    
    public function editUser()
    {
       if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        } 
        
        if ($this->uri->segment(4) == 1)        
        {
            $this->load->view('admin/users/admin_edit_admin');
        }
        else
        {
            $admin_data['user'] = $this->db->query('SELECT id, login, email FROM users WHERE id = '.$this->uri->segment(4).'');
            $this->load->view('admin/users/admin_edit_user', $admin_data);     
        }
        
    }
    
    
    public function updateUser()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $data_array = array('login' => $_POST['login'],'password' => md5($_POST['password']), 'email' => $_POST['email']);
        $this->db->where('id', $_POST['id']); 
        $this->db->update('users', $data_array);
        redirect('admin/users/');  
    }
    
    
    public function deleteUser()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        if ($this->uri->segment(4) == 1)        
        {
            $this->load->view('admin/users/admin_edit_admin');
        }
        else
        {
          $id = $this->uri->segment(4);
          $this->db->where('id', $id);
          $this->db->delete('users'); 
          redirect('admin/users/');  
        }
        
    }
    
}    
?>
