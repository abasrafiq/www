<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin :: Entries</title>
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
    <li><a href="index">Configuration</a></li>
    <li><a href="entries" class="selected">Entries</a></li>
    <li><a href="pages">Pages</a></li>
    <li><a href="users">Users</a></li> 
    <li><a href="backup">Backup</a></li> 
</ul>

<div class="post" id="post">        
    <small>post control panel</small> 
                      
    <table>
        <tr>
            <td><strong>id</strong></td>
            <td><strong>title</strong></td>
            <td><strong>date</strong></td>
            <td><strong>maintenace</strong></td>
        </tr>
         
        <?php foreach($allPost->result() as $post): ?>
        <tr>
            <td><?=$post->id?></td>
            <td><?=$post->title?></td>
            <td><?=$post->date?></td>
            <td><?=anchor('admin/entries/editEntry/'.$post->id, 'Edit')?> / <?=anchor('admin/entries/deleteEntry/'.$post->id, 'Delete')?></td>
        </tr>
        <?php endforeach;?> 
    </table> 

    <?=anchor('admin/entries/addPost', 'Add post', 'class="doButton"')?>  
</div>                                          
</content>
                          
<footer>
2011 &copy; ME!<br/>
memory: {memory_usage} / load: {elapsed_time}s 
</footer>  
</body>
</html>
