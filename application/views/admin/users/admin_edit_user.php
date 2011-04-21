<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?=base_url()?>resources/css/style.css" rel="stylesheet" type="text/css" />
    
</head>
<body>

<header>
     <h1>Admin panel</h1>
     <small>edit user control panel</small>
     <?=anchor('admin/users', 'back to users', 'style="float:right"')?>
     <br><?=anchor('admin/index/logoff', 'logoff', 'style="float:right"')?>                                 
</header>       
        
<content>       
<div class="post">        

 <?=form_open('admin/users/updateUser');?>
            <?php foreach($user->result() as $data): ?> 
            <?=form_hidden('id', $data->id)?>
                
                <label>login:</label>
                <p><input type="text" name="login" size="40" value="<?=$data->login?>" /></p> 
                    
                <label>New password:</label>
                <p><input type="text" name="password" size="40" value="" /></p>

                <label>email:</label>
                <p><input type="text" name="email" size="40" value="<?=$data->email?>" /></p>

                <input type="submit" class="submit" value="Update user"/>
            <?php endforeach;?>
       <?=form_close();?>

                  
     
</div>                                      
</content>
                          
<footer>
2011 &copy; ME!
</footer>  
</body>
</html>