{configuration}
<!doctype html>  
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="{description}" />
    <meta name="keywords" content="{keywords}" />
    <title>{site_title}</title>
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
    <h1>{site_title}</h1>
    <p>{slogan}
    <?=anchor('admin', 'goto admin', 'style="float:right"')?>
    </p> 
    
    <div class="menu">
    <small><strong>main menu:</strong></small>

        {pages}
               <?=anchor('pages/show/{url}', '{title}')?>
        {/pages}
    </div>
                     
</header>       
        
<content>
    <ul>                                 
        {allPost}
            <li>
                <p class="date">{date}</p>
                <h1>{title}</h1>
                <div>{small_body}</div>
                <?=anchor('front/comments/{id}', 'read more')?>
            </li>
        {/allPost}                         
    </ul>
    {pagination}                                      
</content>
                          
<footer>
2011 &copy; ME!
</footer>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
"https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var firstTracker = _gat._getTracker("{google_analytics}");
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
{/configuration}