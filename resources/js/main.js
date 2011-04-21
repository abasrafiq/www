$(function(){

    /** TabContainers here >>> **/   
    var tabContainers = $('content > div'); 
    tabContainers.hide().filter(':first').show();

    $('content ul a').click(function () {
          tabContainers.hide(); 
          tabContainers.filter(this.hash).fadeIn();
          $('content ul a').removeClass('selected'); 
          $(this).addClass('selected');
            return false;
    }).filter(':first').click();
/** end **/
    
    
});