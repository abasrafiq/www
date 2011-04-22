<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');      
  
  /** Users control **/

class Backup extends CI_Controller {    
    
    public function index()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $admin_data['backup'] = get_filenames('backup/');
        $this->load->view('admin/backup/backup', $admin_data);   
        
    } 
      
    public function createBackup()
    {
        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $this->load->model('MySQLDump');           
        $date = date('d_m_Y__H_i');
       
        $dumper = new MySQLDump('ci', 'backup/sql_dump_'.$date.'.sql', false, false);
        $dumper->doDump();
        
        redirect('admin/backup');

    }
    
    public function deleteBackup()
    {

        if (!$this->session->userdata('user')){
            redirect('admin/index/login');
        }
        
        $filename = $this->uri->segment(4);
        unlink("backup/".$filename);
                               
        redirect('admin/backup');
        
    }
    
}    
?>
