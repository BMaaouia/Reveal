<?php
class panier1{

	private  $idpan;
	private  $somme;

	
	
	
	function __construct(string $somme){
	
	
			$this->somme=$somme;
		   		
		
}


 function getsomme():string{
	return $this->somme;
}
 




		
		function setsomme(string $somme):void{
				 $this->somme=$somme;

		}
		

   
  
		
}
?>