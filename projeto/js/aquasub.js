function animacaoLogo(){
	$('#old-title-icon-change').delay(1650).fadeOut(function(){
		$('#middle-icon-change').fadeIn().delay(1300).fadeOut(function(){
				$('#new-title-icon-change').fadeIn();
				// fadeOut(function(){
					// $('#old-title-icon-change').fadeIn(function(){
					// 	animacaoLogo();
					// 	return false;
					// });
				// });
		});
	});	
}




function contatoCliente(){


        $.ajax({
            type: 'POST',
            url: 'data/email.php',            
            data:{	nome_cliente:$("input[name=nome_cliente]").val(),             		
            		assunto:$("input[name=assunto]").val(),
            		email:$("input[name=email]").val(),
            		descricao:$("textarea[name=descricao]").val()
            },                                                 
            success: function(data) { 
              var obj = $.parseJSON(data); 
              $("#container-response").html('');
              if(obj.status == "success"){
              		$("#container-response").append('<div class="alert alert-success"><strong>E-mail enviado para ' + $("input[name=email]").val() + ' com sucesso!</strong> </div>');                              
              }else{
              		$("#container-response").append('<div class="alert alert-danger"><strong>Erro no envio!</strong> Erro ao enviar o e-mail, estamos verificando o que ocorreu, obrigado pela paciência.</div>');            
              }

              $("html, body").animate({scrollTop: $("#container-response").offset().top}, 'slow');



            },
            error: function(reason){
              alert("Erro na requisição.");
            }
        }); 


}

$(window).load(function(){
	animacaoLogo();

  setInterval(
      function(){ 
        $( "#flip" ).trigger( "click" );
      }, 5000
  );

	$("#experiencias-btn-slider").click(function(){
		$( "#top-menu li a[href='#works']" ).trigger( "click" );
	});	

	$("#quem-somos-btn-slider").click(function(){
		$( "#top-menu li a[href='#about']" ).trigger( "click" );
	});

	$("#servicos-btn-slider").click(function(){
		$( "#top-menu li a[href='#service']" ).trigger( "click" );
	});	


});

