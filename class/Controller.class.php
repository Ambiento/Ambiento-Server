<?php
	/**
	* 
	*/
	include("Model.class.php");
	include("View.class.php");
	include("Ocorrencia.class.php");

	class Controller{
		private $adm;
		private $model;
		private $view;
		private $ocorrencia;

		function __construct(){
			$this->model = new Model();
			$this->view = new View();
			return;
		}
		public function load_index(){
			echo $this->view->head("view/head.view.html");
?>
	<body>
<?php		
			if($this->model->verifica_session()){
				echo $this->view->load("view/navbar.logado.view.html");
				$ocorrencias = $this->model->select_ocorrencias();
				if(!$ocorrencias){
					echo "Sem ocorrencias";
				}else{
					print_r($ocorrencias);
				}
			}else{
				echo $this->view->load("view/navbar.deslogado.view.html");
			}
			echo $this->view->footer("view/footer.view.html");
?>
	</body>
<?php
		}
	}
?>