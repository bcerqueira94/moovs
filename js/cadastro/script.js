/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
	 $("#cad-form").validate({
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
	   submitHandler: cadastroForm	
       });  
	   /* validation */
	   
	   /* cadastro submit */
	   function cadastroForm()
	   {		
			var data = $("#cad-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : '../../cad_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error_cadastro").fadeOut();
				$("#btn-cad").html('Cadastrando ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
						$('#cad-form input').val("");
						$("#btn-cad").css('background-color', 'SeaGreen');		
						$("#btn-cad").html('Cadastrado Concluido');
						 setTimeout(function () {
							$("#btn-cad").html('Cadastrar');
							$("#btn-cad").css('background-color', '#2e2e2e');	
						}, 4000);						
					}
					else{
						document.getElementById("error_cadastro").style.display= "block";
						$("#error_cadastro").fadeIn(1000, function(){						
				$("#error_cadastro").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#btn-cad").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Cadastrar');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});