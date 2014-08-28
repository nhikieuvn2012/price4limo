<?php

	class UniteElementsBaseKB{
		
		protected $db;
		
		public function __construct(){
			
			$this->db = new UniteDB();
		}
		
	}

?>