$(document).ready(function(){
	$("#button1").click(function(){
		$("#pp1").fadeIn(3000);
	});


	$("#button2").click(function(){
		$("#pp2").fadeOut(1000);
	});

	$("#button3").click(function(){
		$("#pp3").toggle(1000);
	});

	// $("#button4").click(function(){
	// 	$("#pp4").fadeTo("fast",0.3);
	// });

	$("#button4").click(function(){
		$("#pp4").slideUp();
	});


	$("#button5").click(function(){
		$("#pp5").animate({right: '200px'});
	});

	$("#button6").click(function(){
		$("#pp6").animate({
			left: '250px',
			opacity:'0.5',
			height:'150px',
			width:'150px'
		});
	});


});
