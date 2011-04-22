<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin :: Users</title>
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
    <li><a href="entries">Entries</a></li>
    <li><a href="pages">Pages</a></li>
    <li><a href="users" class="selected">Users</a></li> 
    <li><a href="backup">Backup</a></li> 
</ul>

<div class="users" id="users">        
    <small>users control panel</small> 
                      
    <table>
        <tr>
            <td><strong>id</strong></td>
            <td><strong>login</strong></td>
            <td><strong>email</strong></td>
            <td><strong>maintenace</strong></td>
        </tr> 
        <?php foreach($users->result() as $user): ?>
        <tr>
            <td><?=$user->id?></td>
            <td><?=$user->login?></td>
            <td><?=$user->email?></td>
            <td><?=anchor('admin/users/editUser/'.$user->id, 'Edit')?> / <?=anchor('admin/users/deleteUser/'.$user->id, 'Delete')?></td>
        </tr>
        <?php endforeach;?> 
    </table> 

    <?=anchor('admin/users/addUser', 'Add user', 'class="doButton"')?>
</div>                                            
</content>
                          
<footer>
2011 &copy; ME!<br/>
memory: {memory_usage} / load: {elapsed_time}s 
</footer>  
</body>
</html>
