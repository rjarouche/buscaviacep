<?php
namespace Jarouche\ViaCEP;

/**
 * Classe BuscaViaCEPXML para buscar os dados no formato JSONP
 * @author Rodrigo Jarouche <rjarouche@gmail.com>
 * @package ViaCEP
 * @version 0.1
 */

class BuscaViaCEPJSONP extends BuscaViaCEP
{
    const CEP_METHOD = '/json/unicode/';

    /**
     * Armazena o nome do CallBack Function
     * @var string callback_function
     */
    protected $callback_function = 'CallbackCep';

    /**
     * Método __construct
     * Método construtor que seta o callback function para o padrão
     * @param string $callback_function
     * @throws Exception quando o callback_function não for setado
     */
    public function __construct()
    {
        $this->outros_parametros = '?callback=' . $this->callback_function;
    }

    /**
     * Método setCallbackFunction
     * Método para setar o callback function do JSONP
     * @param string $callback_function
     * @throws Exception quando o callback_function não for setado
     */
    public function setCallbackFunction($callback_function)
    {
        if (trim($callback_function) == '') {
            throw new Exception('CallBack function não pode ser vazia');
        }
        $this->callback_function = $callback_function;
        $this->outros_parametros = '?callback=' . $callback_function;
    }

    /**
     * Método retornaCEP
     * Método para o retorno dos dados do CEP pesquisado
     * @param string $cep
     * @return Array Array com os dados do CEP pesquisado, caso não exista irá retornar um array ('erro' => true);
     */

    public function retornaCEP($cep)
    {
        $this->fazRequisicaoFacade($cep);
        $json = str_ireplace([$this->callback_function . "(", ");"], "", $this->results_string);
        return json_decode($json, true);
    }
}
