<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login page</title>
    <link id="page_favicon" href="<?=base_url()?>resources/images/favicon.ico" rel="icon" type="image/x-icon" /> 
    <link href="<?=base_url()?>resources/css/style.css" rel="stylesheet" type="text/css" />
    

</head>
<body>
<header>
     <h1>Admin panel :: Need auth</h1>
     <?=anchor(index_page(), 'goto front', 'style="float:right"')?>                
</header> 
<content>
        
        <p>Wrong login or password</p>
        
        
        <small>* - required</small><br/>  <br/>
        <?=form_open('admin/index/login_check');?>
        <label>Username *:</label>
        <p><?=form_input('user');?></p>

        <label>Password *:</label>
        <p><input type="password" name="password" /></p>
               
        <br/>
        <?=form_submit('','Enter');?>
        <?=form_close();?>

</content> 
     
<footer>
2011 &copy; ME!
</footer>         
</body>
</html>