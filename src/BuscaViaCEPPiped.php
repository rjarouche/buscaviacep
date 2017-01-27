<?php
namespace Jarouche\ViaCEP;

/**
 * Classe BuscaViaCEPXML para buscar os dados no formato Piped
 * @author Rodrigo Jarouche <rjarouche@gmail.com>
 * @package ViaCEP
 * @version 0.1
 */

class BuscaViaCEPPiped extends BuscaViaCEP
{
    const CEP_METHOD = '/piped/';

    /**
     * Método retornaCEP
     * Método para o retorno dos dados do CEP pesquisado
     * @param string $cep
     * @return Array Array com os dados do CEP pesquisado, caso não exista irá retornar um array ('erro' => true);
     */

    public function retornaCEP($cep)
    {
        $this->fazRequisicaoFacade($cep);
        $dados = explode('|', $this->results_string);
        foreach ($dados as $dado) {
            $aux_array = explode(":", $dado);
            $result[$aux_array[0]] = $aux_array[1];
        }

        return $result;
    }
}
