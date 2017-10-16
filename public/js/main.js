$(document).ready(function() {
	$('a[href=#top]').click(function(){
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
	});
});

function ValForm() {
	if($('#name').val().length < 2) {
		alert("Please enter your name.");
		$('#name').focus();
		return false;
	}
	var re = /^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
	if(!re.test($('#email').val())) {
		alert("Please enter a valid e-mail address.");
		$('#email').focus();
		return false;
	}
	if($('#msg').val().length < 2) {
		alert("Please leave a message.");
		$('#msg').focus();
		return false;
	}
	return true;
}

$(window).load(function(){

	new WOW().init();
	 $(function () {
		 var $win = $(window);

	 });
	 
	
});

$('button[name="submitBtn"]').click(function() {
	$(this).closest('form').submit();
	$(this).attr('disabled', 'disabled');
	var $this = $(this);
	setTimeout(function() {
		$this.removeAttr('disabled');
	}, 5000);
});

document.body.innerHTML = document.body.innerHTML.replace(/[\u200B-\u200D\uFEFF]/g, ''); 

$('#dp3').datepicker();
