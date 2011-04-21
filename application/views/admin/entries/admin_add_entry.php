<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?=base_url()?>resources/css/style.css" rel="stylesheet" type="text/css" />
    
    <!-- TinyMCE -->
    <script type="text/javascript" src="<?=base_url()?>resources/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/tiny_mce/init.js"></script>
    <!-- /TinyMCE -->
        
</head>
<body>

<header>
     <h1>Admin panel</h1>
     <small>add post control panel</small>
     <?=anchor('admin/entries', 'back to entries', 'style="float:right"')?> 
     <br/><?=anchor('admin/index/logoff', 'logoff', 'style="float:right"')?>                                 
</header>       
        
<content>       
<div class="post">        

<?=form_open('admin/entries/addEntry');?>           
    <label>Title:</label>
    <p><input type="text" name="title" size="40" /></p>

    <label>Small description:</label>  
    <p><textarea name="small_body" cols="122"></textarea></p>
    
    <label>Body:</label>  
    <p><textarea name="body" cols="122"></textarea></p>

    <input type="submit" class="submit" value="Add entry"/>
<?=form_close();?>

                  
     
</div>                                      
</content>
                          
<footer>
2011 &copy; ME!
</footer>  
</body>
</html>