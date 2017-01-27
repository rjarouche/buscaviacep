<?php
namespace Jarouche\ViaCEP;

/**
 * Classe BuscaViaCEPXML para buscar os dados no formato JSON
 * @author Rodrigo Jarouche <rjarouche@gmail.com>
 * @package ViaCEP
 * @version 0.1
 */

class BuscaViaCEPJSON extends BuscaViaCEP
{
    const CEP_METHOD = '/json/';

    /**
     * Método retornaCEP
     * Método para o retorno dos dados do CEP pesquisado
     * @param string $cep
     * @return Array Array com os dados do CEP pesquisado, caso não exista irá retornar um array ('erro' => true);
     */

    public function retornaCEP($cep)
    {
        $this->fazRequisicaoFacade($cep);
        return json_decode($this->results_string, true);
    }
}
