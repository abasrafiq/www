<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin :: Configuration</title>
    <link href="/resources/css/style.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="/resources/js/jquery-1.4.2.js"></script>  

</head>
<body>

<header>
     <h1>Admin panel</h1>
     <?=anchor(index_page(), 'goto front', 'style="float:right"')?>
     <br><?=anchor('admin/index/logoff', 'logoff', 'style="float:right"')?>                
</header>       
        
<content>

<ul class="adminMenu">
    <li><a href="index" class="selected">Configuration</a></li>
    <li><a href="entries">Entries control</a></li>
    <li><a href="pages">Pages</a></li>
    <li><a href="users">Users</a></li> 
    <li><a href="backup">Backup</a></li> 
</ul>

<div class="config" id="config">
 <small>config control panel</small>
       <?=form_open('admin/index/updateConfig');?>
            <?php foreach($configuration->result() as $data): ?>         
                <label>Title:</label>
                <p><input type="text" name="site_title" size="40" value="<?=$data->site_title?>" /></p>

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
  

                                     
</content>
                          
<footer>
2011 &copy; ME!<br/>
memory: {memory_usage} / load: {elapsed_time}s 
</footer>  
</body>
</html>
