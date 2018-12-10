$(function(){  

	$('#re-password').on('keyup', function () {
  	if ($('#password').val() == $('#re-password').val()) {
    $('#re-password').css('color', 'green');
    $('input[type="submit"]').removeAttr('disabled');
 	} 
  	else {
    $('#re-password').css('color', 'red');
    $('input[type="submit"]').attr('disabled','disabled');
	}
});
$('.regi_form').on('submit',function(e) {
	e.preventDefault();
	$.ajax({
		type: 'post',
		url: 'connection.php',
		data: $('form').serialize(),
		success: function(data){
			var dat = JSON.parse(data);
			if(dat.indicator=="0"){
			alert("congrats!");}
			if(dat.indicator=="1"){
			alert("email already exist!");}
			if(dat.indicator=="2"){
			alert("phone number already exist!");}
			if(dat.indicator=="3"){
				alert("some thing went wrong!");
			}
		}
	});
});
});