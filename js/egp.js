$(function(){
  
  
  //home search box
  
  $searchBox = $('.header-search'); 
    
    if ($searchBox.val() != '') {  
      $searchBox.removeClass("empty");  
    }
    
    $searchBox.focus(function(e){
      if ($searchBox.val() == '') {  
        $(this).removeClass("empty");  
      }
    });  
    $searchBox.blur(function(e){  
      if ($searchBox.val() == '') {
        $(this).addClass("empty");  
      }
    });  
	
    $('.trigger-search').click(function(event){
        event.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 'fast', function(){
            $searchBox.animate({ backgroundColor: "#f7ce94" }, "fast", function(){
              $searchBox.focus();
              $searchBox.animate({ backgroundColor: "#ffffff" }, "slow");
            })
            
            
        });
    });
       
	//gallery overlay tabs

    var clickcounter = 0;
    $(".slidetabs").tabs(".slides .slide", {

    	// enable "cross-fading" effect
    	effect: 'fade',
    	fadeOutSpeed: "fast",
    	rotate: true,
    	
   	onBeforeClick: function() {
   	  
   	  $(".image-gallery").overlay({
        mask: {
      		color: '#ffffff',
      		loadSpeed: 200,
      		opacity: 0.5
      	},
      	target: '#img_gallery',
      	fixed: false,
      	top: '15%'
      });
   	  
   	  if (clickcounter > 0) {
   	      $(".image-gallery").data("overlay").load();
 	      }
 	      clickcounter++;
    	}

    // use the slideshow plugin. It accepts its own configuration
    }).slideshow({
      next: ".next",
      prev: ".prev",
      clickable: false
    });
    
    var tabs = $(".slidetabs").data('tabs');
    
	//sidebar gallery items
    $(".imagelink a").bind("click", function(){
      if ($(this).parent().index() == tabs.getIndex()) {
        $(".image-gallery").data("overlay").load();
      } else {
        tabs.click($('.slidetabs a[title="'+$(this).attr('title')+'"]').attr('href'));
      }
    });
	
	//in article gallery items
	$('div[id*="attachment"] a').bind("click", function(event){
		event.preventDefault();
		var theId = $(this).parent().attr('id').replace('attachment_', '');  
		$(".image-gallery").data("overlay").load();
		      tabs.click($('.slidetabs a[id="'+theId+'"]').attr('href'));

    });
	
	//make an image click the next button
  $('.slides .asset').bind('click', function(){
      $(this).next('.slidenav').find('.next').click();
  })
    
    
}); 