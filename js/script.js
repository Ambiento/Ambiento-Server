// functions and utilities
function monta_ocorrencias(saida){
	var ocorrencias = "<div id='ocorrencias'>";
	// estilo das ocorrencias
	for (var i = 0; i < saida.length; i++) {
		console.log(saida[i]);
		ocorrencias = ocorrencias+"<div class='ocorrencia'>"+
										"<h3>"+saida[i]["nome_usuario"]+"</h3>"+
										"<p>Cidade: "+saida[i]["cidade"]+"</p>"+
										"<p>Estado: "+saida[i]["estado"]+"</p>"+
										"<p>Referência de Localização: "+saida[i]["referencia_localizacao"]+"</p>"+
										"<h4>Descrição:</h4>"+
										"<p>"+saida[i]["descricao"]+"</p>"+
										"<p><img src='img/ocorrencias_upload/"+saida[i]["caminho_img"]+"'</img></p>"+
										//add +detalhes/acompanhar
									"</div>";
		/*
		caminho_img
	
			"74ff9011a3660e49d3c59b8a72ffa75d20d630b3.png"
		cidade
			
			"fd"
		descricao
			
			"dds"
		estado
			
			"xds"
		idOcorrencia
			
			"1"
		latitude
			
			"0"
		longitude
			
			"0"
		nome_usuario
			
			"ggg"
		referencia_localizacao
			
			"fdd"
		*/
	}
	ocorrencias = ocorrencias+"</div>";
	console.log(ocorrencias);
	// $("#ocorrencias_list").html(ocorrencias);
}
function load_ocorrencias(){
	console.log("Carregando Ocorrencias...");
	//adicionar gif de loading
	$("#status").html("Carregando...");
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "controller/load_ocorrencias.controller.php",
		success: function(saida){
			console.log(saida);
			console.log("OCORRENCIAS - Sucesso na conexão!");
			monta_ocorrencias(saida);
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

				$("#ocorrencias").addClass("active");
				load_ocorrencias();
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
	//reload
	$(document).on('click', '#ocorrencias', function(){
		$(this).addClass("active");
		load_ocorrencias();
	});
});