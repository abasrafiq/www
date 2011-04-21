<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');     
  
/** Users control **/

class Backup extends CI_Controller {    
    
    public function index()
    {
        $admin_data['backup'] = get_filenames('backup/');
        $this->load->view('admin/backup', $admin_data);   
        
    } 
      
    public function createBackup()
    {
        $this->load->model('MySQLDump');           
        $date = date('d_m_Y__H_i');
       
        $dumper = new MySQLDump('ci', 'backup/sql_dump_'.$date.'.sql', false, false);
        $dumper->doDump();
        
        redirect('admin');

    }
    
    public function deleteBackup()
    {
        if (!$this->isAdmin()){
            redirect('admin/login');
        }
        
          $filename = $this->uri->segment(3);
         // delete_files('./backup/');
                               
          redirect('admin/index');
        
        
    }
    
}    
?>
