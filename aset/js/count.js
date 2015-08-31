function countUp(count)
{
    var div_by = 100,
	speed = Math.round(count / div_by),
	$display = $('.count'),
	run_count = 1,
	int_speed = 24;
	
    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
			} else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
			} else {
            clearInterval(int);
		}
	}, int_speed);
}

countUp(495);

function countUp2(count)
{
    var div_by = 100,
	speed = Math.round(count / div_by),
	$display = $('.count2'),
	run_count = 1,
	int_speed = 24;
	
    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
			} else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
			} else {
            clearInterval(int);
		}
	}, int_speed);
}

countUp2(947);

function countUp3(count)
{
    var div_by = 100,
	speed = Math.round(count / div_by),
	$display = $('.count3'),
	run_count = 1,
	int_speed = 24;
	
    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
			} else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
			} else {
            clearInterval(int);
		}
	}, int_speed);
}

countUp3(328);

function countUp4(count)
{
    var div_by = 100,
	speed = Math.round(count / div_by),
	$display = $('.count4'),
	run_count = 1,
	int_speed = 24;
	
    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
			} else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
			} else {
            clearInterval(int);
		}
	}, int_speed);
}

countUp4(5328);


//SCROLL TO TOP----------------------------------------------------
$(document).ready(function(){
	
	// hide #back-top first
	$(".go-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('.go-top').fadeIn();
				} else {
				$('.go-top').fadeOut();
			}
		});
		
		// scroll body to 0px on click
		$('.go-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});
	
});

