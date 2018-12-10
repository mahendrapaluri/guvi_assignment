$(function(){
	$('.login_regi').on('submit',function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'login.php',
			data: $('form').serialize(),
			success: function(data){ 
				var dat = JSON.parse(data);
				if(dat.indicator=="1"){
					$("body").load("success.html");
				}
				else{
					alert("Invalid credentials");
				}
			}
		});
	});
});	