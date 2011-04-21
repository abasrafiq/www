<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/** Pages control **/

class Pages extends CI_Controller {    
    
    public function index()
    {
        $admin_data['pages'] = $this->db->query('SELECT id, url, title, body, template, `show`, date FROM pages');
        $this->load->view('admin/pages/pages', $admin_data);   
        
    }
      
    public function editPage()
    {
       if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
       $admin_data['onePage'] = $this->db->query('SELECT id, url, title, body, date, template FROM pages WHERE id = '.$this->uri->segment(4).'');
       $admin_data['templates'] = get_filenames('application/views/templates/'); 
       
       $this->load->view('admin/pages/admin_edit_page', $admin_data); 
    }
    
    
    public function deletePage()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
            
        $id = $this->uri->segment(4);
        $this->db->where('id', $id);
        $this->db->delete('pages'); 
        redirect('admin/pages/');
    }
    
    
    public function updatePage()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $data_array = array('url' => $_POST['url'],'title' => $_POST['title'], 'body' => $_POST['body'], 'date' => date('Y-m-d'), 'template' => $_POST['template']);
        $this->db->where('id', $_POST['id']); 
        $this->db->update('pages', $data_array);
        redirect('admin/pages/');  
    }
    
    
    public function addPage()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $data['templates'] = get_filenames('application/views/templates/');       
        $this->load->view('admin/pages/admin_add_page', $data); 
    }
    
    
    public function addPageContent()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
         
        $_POST['date'] = date('Y-m-d');
        $this->db->insert('pages', $_POST);
        redirect('admin/pages/');
    }
    
    public function setMain()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        
        $this->db->query('UPDATE `pages` SET `show` = 0');     // total 0
        $this->db->query('UPDATE `pages` SET `show` = 1 WHERE id='.$this->uri->segment(4).'');
        
        
        redirect('admin/pages/');
         
        
    }
    
    
    
    
    
    
    
}    
?>
