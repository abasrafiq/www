<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?=base_url()?>resources/css/style.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="<?=base_url()?>resources/js/jquery-1.4.2.js"></script>  
    <script type="text/javascript" src="<?=base_url()?>resources/js/main.js"></script>
</head>
<body>

<header>
     <h1>Admin panel</h1>
     <?=anchor(index_page(), 'goto front', 'style="float:right"')?>
     <br><?=anchor('admin/logoff', 'logoff', 'style="float:right"')?>                
</header>       
        
<content>

<ul class="adminMenu">
    <li><a href="#config">Configuration</a></li>
    <li><a href="#post">Post control</a></li>
    <li><a href="#pages">Pages</a></li>
    <li><a href="#users">Users</a></li> 
    <li><a href="#backup">Backup</a></li> 
</ul>

<div class="config" id="config">
 <small>config control panel</small>
       <?=form_open('admin/updateConfig');?>
            <?php foreach($admin_data->result() as $data): ?>         
                <label>Title:</label>
                <p><input type="text" name="title" size="40" value="<?=$data->title?>" /></p>

                <label>Slogan:</label>  
                <p><input type="text" name="slogan" size="40" value="<?=$data->slogan?>" /></p>

                <label>Keywords:</label>  
                <p><textarea name="keywords" cols="40"><?=$data->keywords?></textarea></p>

                <label>Description:</label>  
                <p><textarea name="description" cols="40"><?=$data->description?></textarea></p>

                <label>Google Analytics UA- code:</label>
                <p><input type="text" name="google_analytics" size="40" value="<?=$data->google_analytics?>" /></p>  

                <label>Posts per page:</label>  
                <p><input type="text" name="onpage" size="40" value="<?=$data->onpage?>" /></p>
                
                <input type="submit" class="submit" value="Update configuration"/>
            <?php endforeach;?>
       <?=form_close();?> 
</div>       

<div class="post" id="post">        
<small>post control panel</small> 
                  
<table>
<tr><td><strong>id</strong></td><td><strong>title</strong></td><td><strong>date</strong></td><td><strong>maintenace</strong></td></tr> 
<?php foreach($allPost->result() as $post): ?>
 
<tr><td><?=$post->id?></td><td><?=$post->title?></td><td><?=$post->date?></td><td><?=anchor('admin/editEntry/'.$post->id, 'Edit')?> / <?=anchor('admin/deleteEntry/'.$post->id, 'Delete')?></td></tr>

<?php endforeach;?> 
</table> 

<?=anchor('admin/addPost', 'Add post', 'class="doButton"')?>
    
</div> 


<div class="pages" id="pages">        
<small>page control panel</small> 
                  
<table>
<tr><td><strong>id</strong></td><td><strong>url</strong></td><td><strong>title</strong></td><td><strong>date</strong></td><td><strong>maintenace</strong></td></tr> 
<?php foreach($pages->result() as $page): ?>
 
<tr><td><?=$page->id?></td><td><?=$page->url?></td><td><?=$page->title?></td><td><?=$page->date?></td><td><?=anchor('admin/editPage/'.$page->id, 'Edit')?> / <?=anchor('admin/deletePage/'.$page->id, 'Delete')?></td></tr>

<?php endforeach;?> 
</table> 

<?=anchor('admin/addPage', 'Add page', 'class="doButton"')?>
    
</div> 


<div class="users" id="users">        
<small>users control panel</small> 
                  
<table>
<tr><td><strong>id</strong></td><td><strong>login</strong></td><td><strong>email</strong></td><td><strong>maintenace</strong></td></tr> 
<?php foreach($users->result() as $user): ?>
 
<tr><td><?=$user->id?></td><td><?=$user->login?></td><td><?=$user->email?></td><td>


<?
    if($user->id != 1){
        echo anchor('admin/editUser/'.$user->id, 'Edit')." / ".anchor('admin/deleteUser/'.$user->id, 'Delete');   
    }    
    
?>

</td></tr>

<?php endforeach;?> 
</table> 

<?=anchor('admin/addUser', 'Add user', 'class="doButton"')?>
    
</div> 



<div class="backup" id="backup">        
<small>backup control panel</small> 

<table>
<tr><td><strong>filename</strong></td><td><strong>maintenace</strong></td></tr> 
<?php foreach($backup as $file): ?>
 
<tr><td><?=$file?></td><td></td></tr>

<?php endforeach;?> 
</table> 
            
<?=anchor('admin/backup', 'Create backup', 'class="doButton"')?>
    
</div> 


                                     
</content>
                          
<footer>
2011 &copy; ME!<br/>
memory: {memory_usage} / load: {elapsed_time}s 
</footer>  
</body>
</html>
