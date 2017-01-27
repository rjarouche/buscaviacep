<?php
namespace Jarouche\ViaCEP;

/**
 * Classe HelperViaCep  helper para facilitar a busca de dados por qualquer tipo de requisição
 * @author Rodrigo Jarouche <rjarouche@gmail.com>
 * @package ViaCEP
 * @version 0.1
 */

class HelperViaCep
{
    private function __construct()
    {}

    /**
     * Método getBuscaViaCEP
     * Método para o retorno dos dados tanto da requisição bruta, quanto do array de resultados do cep
     * AVISO, CASO QUEIRA UTILIZAR O FORMATO JSONP e queira especificar o callback funcation, use diretamente a classe BuscaViaCEPJSONP
     * O nome padrão para o callbackfunction é CallbackCep
     * @param method string Método de busca.
     * @param cep string cep a ser buscado.
     * @return Array ['result' => $array_de_dados, 'text'=>$texto_bruto_requisicao]
     * @throws Exception , quando não encontra a classe formada por BuscaViaCEP.$metodo
     */

    public static function getBuscaViaCEP($method, $cep)
    {
        $namespace = 'Jarouche\\ViaCEP\\';
        $class = $namespace . 'BuscaViaCEP' . $method;

        try {
            $obj = new $class;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return ["result" => $obj->retornaCEP($cep), "text" => $obj->retornaConteudoRequisicao()];
    }
}
