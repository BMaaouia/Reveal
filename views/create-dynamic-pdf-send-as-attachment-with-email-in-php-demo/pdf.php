<?php

//pdf.php

require_once 'C:/xampp/htdocs/reveal123(ajouter+afficher+supprimer)/reveal123/views/create-dynamic-pdf-send-as-attachment-with-email-in-php-demo/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{

	public function __construct(){
		parent::__construct();
	}
}

?>