<?php
class rating{
		private  $id;
		private  $note;
		private  $date;

		function __construct($id,$note){
			
			$this->id=$id;
			$this->note=$note;


		}
		
		function getid(){
			return $this->id;
		}
		function getrating():string{
			return $this->note;

        }
	function setrating(string $note):void{
			$this->note=$note;
		}

    }
	
?>