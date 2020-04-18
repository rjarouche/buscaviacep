<?php
namespace Jarouche\ViaCEP;


class BuscaViaCEPLogradouro extends BuscaViaCEPJSON
{

    public function retornaCEP($cep)
    {
        extract($cep);
        if(trim($uf) == "" || trim($cidade) == "" || trim($logradouro) == "" ){
            throw new \Exception("Os parâmetros uf,cidade e logradouro deve ser preeenchidos");
        }
        $uf = rawurlencode($uf);
        $cidade = rawurlencode($cidade);
        $logradouro = rawurlencode($logradouro);

        $this->cep = "$uf/$cidade/$logradouro";
        $this->buscaInfoCEP();
        return json_decode($this->results_string, true);
    }
}
