// Main execution
$(document).ready(function() { 
	session();
	//reload
	$(document).on('click', '#ocorrencias', function(){
		$(this).addClass("active");
		load_ocorrencias();
	});
});