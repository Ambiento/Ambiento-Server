// functions and utilities
function monta_ocorrencias(saida){
	var ocorrencias = "";
	// estilo das ocorrencias
	for (var i = 0; i < saida.length; i++) {
		console.log(saida[i]);

		ocorrencias = ocorrencias+"<div class='ocorrencia'>"+
							"<h3>"+saida[i]["nome_usuario"]+"</h3>"+
							"<ul class='list-group'>"+
								"<li class='list-group-item'>Cidade: "+saida[i]["cidade"]+"</li>"+
								"<li class='list-group-item'>Estado: "+saida[i]["estado"]+"</li>"+
								"<li class='list-group-item'>Referência de Localização: "+saida[i]["referencia_localizacao"]+"</li>"+
								"<li class='list-group-item'>"+
									"<h4>Descrição:</h4>"+
									"<p>"+saida[i]["descricao"]+"</p>"+
								"</li>"+
								"<a href='acompanhar_ocorrencia.controller.php?idOcorrencia="+saida[i]["idOcorrencia"]+"' class='list-group-item list-group-item-info'>+ Detalhes/Acompanhamento</a>"+
							"</ul>"+
							// "<img width='200' height='300' class='img-responsive img-thumbnail' src='img/ocorrencias_upload/"+saida[i]["caminho_img"]+"'</img>"+
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
	console.log(ocorrencias);
	$("#ocorrencias_list").html(ocorrencias);
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