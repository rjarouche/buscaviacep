<?php
	 require __DIR__ . '/src/BuscaViaCEP_inc.php';
	 use Jarouche\ViaCEP\HelperViaCep;
	 $class_cep = HelperViaCep::getBuscaViaCEP('Piped','01311300');
     print_r($class_cep);