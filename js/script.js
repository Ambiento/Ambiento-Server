// Call back
// $("#form_login").on("submit", function(){
// 	var dados = $(this).serialize();
// 	$.ajax({
// 		type: "POST",
// 		dataType: "json",
// 		url: "controller/singin_adm.controller.php",
// 		data: dados,
// 		success: function(saida)
// 		{
// 			alert("Logando");
// 			console.log("conexão efetuada!");
// 			console.log(saida);
// 		}
// 	});
// });
function session(){
	console.log("Verificando Sessao");
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "controller/verify_session.controller.php",
		success: function(saida){
			console.log("Sucesso na conexão!");
			if (saida["logado"]) {
				console.log("Sessão existe");
				$("#myNavbar").html(saida["myNavbar"]);
			}else{
				console.log("Sessão não existe");
				$("#myNavbar").html(saida["myNavbar"]);
			}
		}
	});
}

$(document).ready(function() {
	session();
});