/*! Please do not remove ! for uglify comment preservation
 */

jQuery(document).ready( function($) {
	

$('a[href*=#]').click(function(event){
	event.preventDefault();
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 500,'swing');
    
});

console.dir(data);
var pageNum = parseInt(data.startPage) + 1;
var maxPages = parseInt(data.maxPages);
var nextLink = data.nextLink;
if(pageNum <= maxPages) {
	// Insert the "More Posts" link.
	$('.loadmore-container')
		.append('<div class="pbd-alp-placeholder-'+ pageNum +'"></div>')		
}
$("#load-more").click(function(){
	if(pageNum < maxPages) {
		$(this).text('Loading Posts...');
	} else {
		$("#load-more").append('.');
	}
	$('.pbd-alp-placeholder-'+ pageNum).load(nextLink + ' .post',
		function() {
			// Update page number and nextLink.
			pageNum++;
			console.dir(pageNum);
			nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ pageNum);
			// Add a new placeholder, for when user clicks again.
			var lastPage = pageNum - 1;
			$('.pbd-alp-placeholder-' + lastPage)
				.after('<div class="pbd-alp-placeholder-'+ pageNum +'"></div>')
	 
			// Update the button message.
			if(pageNum <= maxPages) {
				$("#load-more").text('Load more posts');
			} else {
				$("#load-more").text('No more posts to load.');
			}
			
		}
	);
	return false;

});


/*
==================================================
| jquery sticky back to top button
==================================================
*/
	$(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
			$('.go-top').fadeIn(200);
		} else {
			$('.go-top').fadeOut(200);
		}
	});	
	// Animate the scroll to top
	$('.go-top').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, 1000);
	})

});

