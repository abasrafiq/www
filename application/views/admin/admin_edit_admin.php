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
     <?=anchor('admin', 'back to admin', 'style="float:right"')?>
     <br><?=anchor('admin/logoff', 'logoff', 'style="float:right"')?>                                 
</header>       
        
<content>       
<div class="post">        
     <p>Administrator account can't be edited!</p>
     <p><a href="javascript:history.go(-1)">go back</a></p>
</div>                                      
</content>
                          
<footer>
2011 &copy; ME!
</footer>  
</body>
</html>