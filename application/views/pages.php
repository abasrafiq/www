<?php foreach($configuration->result() as $siteParams): ?>  
<!doctype html>  
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="<?=$siteParams->description?>" />
    <meta name="keywords" content="<?=$siteParams->keywords?>" />
    <title><?=$siteParams->site_title?></title>
    <link id="page_favicon" href="<?=base_url()?>resources/images/favicon.ico" rel="icon" type="image/x-icon" /> 
    <link href="<?=base_url()?>resources/css/style.css" rel="stylesheet" type="text/css" />
    <script src="<?=base_url()?>resources/js/modernizr-1.6.min.js"></script>
    
     <!--[if lt IE 7 ]>
    <script src="<?=base_url()?>resources/js/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix('.');</script>
    <![endif]-->
    
</head>
<body>

<header>
    <h1><?=$siteParams->site_title?></h1>
    <p><?=$siteParams->slogan?><?=anchor(index_page(), 'goto front', 'style="float:right"')?></p> 
    
    <div class="menu">
    <small><strong>main menu:</strong></small>
    <?php 
        if($pages->num_rows() > 0){
              foreach($pages->result() as $page)
              {
                if ($page->url == $this->uri->segment(3))
                {
                    echo anchor('pages/show/'.$page->url, $page->title, 'class="selected"');
                }
                else
                {
                    echo anchor('pages/show/'.$page->url, $page->title);
                }              
              }  
        }
    ?>
    </div>
                     
</header>       
        
<content>
<div class="content">
<?php if($content->num_rows() > 0): ?> 
    <?php foreach($content->result() as $data): ?>
    
        <p class="date"><?=substr($data->date, 0 ,10)?></p>
        <h1><?=$data->title?></h1>
        <p><?=$data->body?></p>
        
   <?php endforeach;?>
<?php endif; ?>
</div>
    
    
    
</content>
                          
<footer>
2011 &copy; ME!<br/>
memory: {memory_usage} / load: {elapsed_time}s
</footer>  
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
"https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
var firstTracker = _gat._getTracker("<?=$siteParams->google_analytics?>");
firstTracker._addOrganic("tut.by", "query");
firstTracker._addOrganic("search.tut.by", "query");
firstTracker._addOrganic("all.by", "query");
firstTracker._addOrganic("nova.rambler.ru", "query");
firstTracker._addOrganic("go.mail.ru", "q");
firstTracker._initData();
firstTracker._trackPageview();
</script>   
</body>
</html>
<?php endforeach; ?>