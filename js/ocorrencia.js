// Main execution
$(document).ready(function() {
	$("#form_comentario").submit(function(){
		alert("COmentando");
		var dados = $(this).serialize();
		$.ajax({
			// controller/publicar_comentario.controller.php?idOcorrencia=1
			// POST
		});
	});
});