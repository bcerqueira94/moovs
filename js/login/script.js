/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			password: {
			required: true,
			},
			user_email: {
            required: true,
            email: true
            },
	   },
       messages:
	   {
            password:{
                      required: "Por favor preencha seu e-mail"
                     },
            user_email: "Por favor preencha seu e-mail",
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : '../../login_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error_login").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Verificando ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
						$("#btn-login").html('Entrando ...');
						 setTimeout(function () {
							 window.location.href = "../../painel.php";
						}, 4000);
					}
					else{
									
						$("#error_login").fadeIn(1000, function(){						
				            $("#error_login").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						    $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Entrar');
					    });
					}
			  }
			});
				return false;
		}
});