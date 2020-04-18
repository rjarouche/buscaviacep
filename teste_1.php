<?php
require __DIR__ . '/vendor/autoload.php';

use Jarouche\ViaCEP\HelperViaCep;

//Using Helper
$result = HelperViaCep::getBuscaViaCEP('Json', '01311300');
print_r($result);

//Using class
$class = new Jarouche\ViaCEP\BuscaViaCEPJSONP();
$class->setCallbackFunction('teste_teste');
$result = $class->retornaCEP('01311300');
echo $class->retornaConteudoRequisicao();
print_r($result);

//pegando pelo filtro de estado,cidade e logradouro
$class_cep = HelperViaCep::getBuscaViaCEPLogradouro('SP',"São Paulo","Paulista");
var_dump($class_cep);
