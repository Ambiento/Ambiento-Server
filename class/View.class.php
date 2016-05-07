<?php
	/**
	* 
	*/
	class View{		
		public function __construct(){
			return;
		}
		public function render_file($_filename){
			echo file_get_contents($_filename);
		}
		public function render($_content){
			echo $_content."\n";
		}
	}
?>