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
     <small>edit page control panel</small>
     <?=anchor('admin/pages', 'back to pages', 'style="float:right"')?>
     <br><?=anchor('admin/index/logoff', 'logoff', 'style="float:right"')?>                                 
</header>       
        
<content>       
<div class="post">        

 <?=form_open('admin/pages/updatePage');?>
            <?php foreach($onePage->result() as $data): ?> 
            <?=form_hidden('id', $data->id)?>
                
                <label>Url:</label>
                <p><input type="text" name="url" size="40" value="<?=$data->url?>" /></p> 
                    
                <label>Title:</label>
                <p><input type="text" name="title" size="40" value="<?=$data->title?>" /></p>

                <label>Body:</label>  
                <p><textarea name="body" cols="122"><?=$data->body?></textarea></p>

                <label>Template:</label>
                <p><select name="template">
                    <?php foreach($templates as $tpl)
                    { 
                       if ($data->template == $tpl)
                       {
                            echo "<option selected>".$tpl."</option>";   
                       }
                       else
                       {
                            echo "<option>".$tpl."</option>";
                       }
                    }
                    ?>
                </select></p>
                
                
                <input type="submit" class="submit" value="Update page"/>
            <?php endforeach;?>
       <?=form_close();?>

                  
     
</div>                                      
</content>
                          
<footer>
2011 &copy; ME!
</footer>  
</body>
</html>