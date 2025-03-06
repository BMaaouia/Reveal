<?php
class type{
		private  $id;
		private  $type;
		private  $date;

		function __construct($id,$type,$contenu){
			
			$this->id=$id;
			$this->type=$type;
            $this->contenu=$contenu;

		}
		
		function getid(){
			return $this->id;
		}
		function gettype():string{
			return $this->type;
		}
		function getcontenu(){
			return $this->contenu;
		}


	function settype(string $type):void{
			$this->type=$type;
		}

        function setcontenu(int $contenu):void{
			$this->contenu=$contenu;
		}    
		

	}
?>