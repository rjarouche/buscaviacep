<?php
	 require __DIR__ . '/src/BuscaViaCEP_inc.php';

   //usar o helper
     use Jarouche\ViaCEP\HelperViaCep;

     //tipos permitidos
     $array_tipos =['Querty','Piped','JSON','JSONP','XML'];


     // testando todos os tipos de requisição
     foreach ($array_tipos as $tipo){
         //helper retorna da dados do cep através dos parâmetros tipo e cep
         $class_cep = HelperViaCep::getBuscaViaCEP($tipo,'01311300');
           var_dump($class_cep);
     }


     //Utilizando via Classe
    $class = new Jarouche\ViaCEP\BuscaViaCEPJSONP();
    /*como é JSONP, existe a opção de setar o nome da callback function,
     * ESTÁ OPÇÃO ESTÁ SOMENTE DISPONÍVEL SE UTILIZAR A CLASSE Jarouche\ViaCEP\BuscaViaCEPJSONP();
     */
    $class->setCallbackFunction('teste_teste');

    //Faz o retorno do CEP
    $result = $class->retornaCEP('01311300');
    echo $class->retornaConteudoRequisicao();
    print_r($result);

   //pegando pelo filtro de estado,cidade e logradouro
   $class_cep = HelperViaCep::getBuscaViaCEPLogradouro('SP',"São Paulo","Paulista");
   var_dump($class_cep);
