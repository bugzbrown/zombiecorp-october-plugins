<?php

namespace Zombiecorp\Ceps\Classes;

use Zombiecorp\Ceps\Models\Cep;
/**
 * Faz a consutla de CEPS na Republica Virtual e retorna um ARRAY com o resultado
 */
class ConsultaCep
{
    static function busca_cep($cep){
        $res = ConsultaCep::getLocalCep($cep);
        if (!$res){
            // trace_log('CEP CONSULTADO REMOTO: '.$cep);
            // we have no local copy of this zipcode
            // $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=json');
            $resultado = ConsultaCep::curlCep(urlencode($cep));

            // trace_log($resultado);
            $dados = ($resultado);
            if (!$dados){
                return false;
            }
            if ($dados->resultado != 0){
                $data = [
                    'cep' => $cep,
                    'tipo_logradouro' => $dados->tipo_logradouro,
                    'logradouro' => $dados->logradouro,
                    'bairro' => $dados->bairro,
                    'cidade' => $dados->cidade,
                    'uf' => $dados->uf,
                ];
                $res = ConsultaCep::insertLocalCep($data);
            }else{
                $res = false;
            }
        }

        return $res;
    }

    private static function getLocalCep($cep)
    {
        $res = Cep::where('cep', $cep)->first();
        return $res;
    }
    private static function insertLocalCep($data){
        $res = Cep::firstOrCreate($data);
        return $res;
    }
    private static function curlCep($cep){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://republicavirtual.com.br/web_cep.php?cep=" . $cep . "&formato=json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Host: republicavirtual.com.br",
            "Zombiecorp-Token: c4a22efa-295c-41a5-815b-7b353e798527,071f5b9a-3300-47ad-a45e-71e260a60b9f",
            "User-Agent: PostmanRuntime/7.13.0",
            "accept-encoding: gzip, deflate",
            "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return json_decode($response);
        }
    }
}