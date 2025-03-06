<?php
class panier1{

	private  $idpan;
	private  $somme;

	
	
	
	function __construct(string $idpan,string $somme){
	
		$this->idpan=$idpan;
			$this->somme=$somme;
		   		
		
}
function getidpan():int{
	return $this->idpan;
}

 function getsomme():int{
	return $this->somme;
}
 




		function setidpan(int $idpan):void{
			$this->idpan=$idpan;
		}
		
		function setsomme(int $somme):void{
				 $this->somme=$somme;

		}
		

   
  
		
}
?>