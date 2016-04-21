// functions and utilities
function load_ocorrencias(){
	console.log("Carregando Ocorrencias...");
	//adicionar gif de loading
	$("#center").prepend("Carregando...");
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "controller/load_ocorrencias.controller.php",
		success: function(saida){
			console.log("OCORRENCIAS - Sucesso na conexão!");
			block = false;
		}
	});
}
function session(){
	console.log("Verificando Sessao");
	//adicionar gif de loading
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "controller/verify_session.controller.php",
		success: function(saida){
			console.log("SESSION - Sucesso na conexão!");
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

// Main execution
$(document).ready(function() { 
	session();
	$(document).on('click', '#ocorrencias', function(){
		$(this).addClass("active");
		load_ocorrencias();
	});
});