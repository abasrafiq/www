<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin :: Pages</title>
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
    <li><a href="entries">Entries control</a></li>
    <li><a href="pages" class="selected">Pages</a></li>
    <li><a href="users">Users</a></li> 
    <li><a href="backup">Backup</a></li> 
</ul>

<div class="pages" id="pages">        
    <small>pages control panel</small> 
                      
    <table>
        <tr>
            <td><strong>id</strong></td>
            <td><strong>url</strong></td>
            <td><strong>title</strong></td>
            <td><strong>date</strong></td>
            <td><strong>isMain</strong></td>
            <td><strong>template</strong></td>
            <td><strong>maintenace</strong></td>
        </tr>
         
        <?php foreach($pages->result() as $page): ?>
        <tr>
            <td><?=$page->id?></td>
            <td><?=$page->url?></td>
            <td><?=$page->title?></td>
            <td><?=$page->date?></td>
            <td><?=$page->show?><span style="padding-left:10px;"><? if (!$page->show) echo "<a href='pages/setMain/".$page->id."'>set as main</a>"; ?></span></td>
            <td><?=$page->template?></td> 
            <td><?=anchor('admin/pages/editPage/'.$page->id, 'Edit')?> / <?=anchor('admin/pages/deletePage/'.$page->id, 'Delete')?></td>
        </tr>
        <?php endforeach;?> 
    </table> 

    <?=anchor('admin/pages/addPage', 'Add page', 'class="doButton"')?> 
</div>                                           
</content>
                          
<footer>
2011 &copy; ME!<br/>
memory: {memory_usage} / load: {elapsed_time}s 
</footer>  
</body>
</html>
