<?php
	/**
	* 
	*/
	class View{		
		public function __construct(){
			return;
		}
		public function load($_filename){
			return file_get_contents($_filename);
		}
		public function head($_headfile){
			$response = $this->load($_headfile);
			return $response;
		}
		public function footer($_footerfile){
			$response = $this->load($_footerfile);
			return $response;
		}
	}
?>