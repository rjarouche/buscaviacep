<?php
namespace Jarouche\ViaCEP;

/**
 * Classe BuscaViaCEPXML para buscar os dados no formato XML
 * @author Rodrigo Jarouche <rjarouche@gmail.com>
 * @package ViaCEP
 * @version 0.1
 */

class BuscaViaCEPXML extends BuscaViaCEP
{
    const CEP_METHOD = '/xml/';

    /**
     * Método retornaCEP
     * Método para o retorno dos dados do CEP pesquisado
     * @param string $cep
     * @return Array Array com os dados do CEP pesquisado, caso não exista irá retornar um array ('erro' => true);
     */

    public function retornaCEP($cep)
    {
        $this->fazRequisicaoFacade($cep);
        $xml = simplexml_load_string($this->results_string);
        $results = json_encode($xml);
        return array_map(function ($val) {
            return empty($val) ? "" : $val;
        }, json_decode($results, true));
    }
}
