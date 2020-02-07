<html
<head>
<title>Pause and Slide Images</title>
<SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
/* slider.js */
$.fn.startSlider = function(){
	var sliderDIV=this;
	var img=sliderDIV.find("img");
	
	sliderDIV.css({overflow:"auto"});
	img.css({position:'absolute'});
	img.hide().first().show().addClass("active");
	
	var pause = false;
	var iterateTickerElement = function() {
		setInterval(function(){
			if(!pause) {
				var next = $("img.active").next();
				$("img.active").hide("slide",{direction:'left'},2000);
				$("img.active").removeClass("active");
				if(next.length == 0) next = $("img").first();
				next.addClass("active");
				next.show("slide",{direction:'right'},1000);
			}
		},2000);
	}
	sliderDIV.hover(
	function(){
		pause=true;
	},
	function(){
		pause=false;
	});
	iterateTickerElement();
}
</script>
</head>
<body>
<div>
<div id="slider-div">
	<img src="1.jpg">
	<img src="2.jpg">
	<img src="3.jpg">
	<img src="4.jpg">
</div>
<script>
$("#slider-div").startSlider();
</script>
</body>
</html>