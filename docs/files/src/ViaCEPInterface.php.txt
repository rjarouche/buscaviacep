<?php
namespace Jarouche\ViaCEP;

/**
 * Interface para definir um tipo para todos as classes
 * @author Rodrigo Jarouche <rjarouche@gmail.com>
 * @package ViaCEP
 * @version 0.1
 */
interface ViaCEPInterface
{
    /**
     * Método retornaCEP
     * Método para o retorno dos dados do CEP pesquisado
     * @param string $cep
     * @return Array Array com os dados do CEP pesquisado, caso não exista irá retornar um array ('erro' => true);
     */
     public function retornaCEP($cep);
     
    /**
     * Método retornaConteudoRequisicao
     * Método para o retorno dos dados da requisição bruta, este método deve ser usado apenas depois de uma requisição já feita através de @see retornaCEP
     * @return String String da requisição pura
     * @throws Exception 
     */
     public function retornaConteudoRequisicao();
}



