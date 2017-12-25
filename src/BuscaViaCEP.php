<?php
namespace Jarouche\ViaCEP;
/**
 * Classe buscaViaCEP
 * Classe Abstrata para definição de similaridades entre as demais classes
 * @author Rodrigo Jarouche <rjarouche@gmail.com>
 * @package ViaCEP
 * @version 0.1
 */

abstract class buscaViaCEP implements ViaCEPInterface
{
    /** 
     * Constante que indica qual o endereço da requisição
     * @var string CEP_SITE 
     */
    const CEP_SITE = 'http://viacep.com.br/ws/';
    
    /** 
     * 
     *Constante utilizada para dizer o sub-endereço da requisição
     *p.ex para a requisição https://viacep.com.br/ws/cep_a_buscar/querty/ o valor da variável será '/querty/'
     *Deve ser especificada nas classes filhas que formalmente farão a implementação do método de busca 
     * @var string CEP_METHOD 
    */
    const CEP_METHOD = '';
    /** 
     * Armazena cep pré-formatado para busca p.ex 09190099
     * @var string $cep 
     */
    protected $cep;
     /** 
      *Armazena o retorno bruto da requisição
      *@var string $results_string 
     */
    protected $results_string;
    /** 
      *Parâmetros extra para requisição
      *@var string $outros_parametros 
     */
    protected $outros_parametros;
     /**
     * Método validaCEP
     * Método para a formatação e validação do cep a ser pesquisado
     * @param string $cep
     * @return void;
      * @throws Exception
     */
    protected function validaCEP($cep)
    {
        $formated_cep = preg_replace("/[^0-9]/", "", $cep);
        if (!preg_match('/^[0-9]{8}?$/', $formated_cep)) {
            throw new \Exception("CEP inválido");
        }
        $this->cep = $formated_cep;
    }
    
    /**
     * Método buscaInfoCEP
     * Método para fazer a requisição e alementar a propriedade results_string
     * @param string $outros_parametros
     * Parâmetro para colocar varáveis extra na url de chamada
     * @return void;
      * @throws Exception
     */

    protected function buscaInfoCEP()
    {
        
        /*
        $this->results_string = file_get_contents(
                                    self::CEP_SITE . 
                                    $this->cep . 
                                    static::CEP_METHOD.
                                    $this->outros_parametros
        );
        */
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        $url = self::CEP_SITE . $this->cep . static::CEP_METHOD.$this->outros_parametros;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSLVERSION,3); 
        $this->results_string = curl_exec($ch);
        curl_close($ch);
        
    }
    /**
     * Método fazRequisicao
     * Método FACADE para validar e fazer a requicao;
     * @param string $cep
     * @param string $outros_parametros
     * Parâmetro para colocar varáveis extra na url de chamada
     * @return void;
     * @throws Exception
    */
    protected function fazRequisicaoFacade($cep)
    {
        $this->validaCEP($cep);
        $this->buscaInfoCEP();
    } 
    
    
    
    public function retornaConteudoRequisicao()
     {  
        if($this->results_string == ""){
            throw new \Exception('Não houve requisição através do método retornaCEP');
        }
        return $this->results_string;
     }
     
     

    abstract public function retornaCEP($cep);

}
