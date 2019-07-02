<?php
namespace Zombiecorp\Ceps\Classes;
use DB;
use Schema;
use Zombiecorp\Ceps\Models\Cep;
/**
 * Faz a consutla de CEPS na Republica Virtual e retorna um ARRAY com o resultado
 */
class ConsultaCep
{
    /**
     * Função que busca o CEP independente de onde ele vier.
     * Ela tenta busca primeiro na base da RV local
     * Depois tenta busca na sua própria base local
     * Finalmente tenta busca no site do RV
     *
     * @param string $cep
     * @return mixed boolean/Array
     */
    static function busca_cep($cep){
        $res = false;
        if (ConsultaCep::hasLocalBase()){
            // tem a base do RV aqui?
            $res = ConsultaCep::getFromDB($cep);
        }

        if (!$res){
            // Vamos usar a nossa
            $res = ConsultaCep::getLocalCep($cep);
        }
        if (!$res){
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

    /**
     * Faz a busca nas tabelas locais do RV
     *
     * @param string $cep
     * @return mixed boolean/Array
     */
    private static function getFromDB($cep)
    {
        $uf = DB::table('uf')
            ->where('Cep1', '<=', $cep )
            ->where('Cep2', '>=', $cep )->get();

            $cep2 = preg_replace('/(\d{3}$)/',"-$1",$cep);
            // dd($cep2);
        if (count($uf)>0){
            $myUF = strtolower($uf[0]->UF);
            $address = DB::table($myUF)
                            ->where('cep',$cep2)->get();
            if(count($address)>0){
                $tm =new \stdClass();

                $tm->cep = $cep;
                $tm->tipo_logradouro= $address[0]->tp_logradouro;
                $tm->logradouro= $address[0]->logradouro;
                $tm->bairro= $address[0]->bairro;
                $tm->cidade= $address[0]->cidade;
                $tm->uf =strtoupper($myUF);


                return $tm;
            }
        }
        return false;

    }

    /**
     * Verifica se existe a base da republica virtual em seu ambiente.
     * Se não houver, dispara um evento de LOG no server para notificar o admin.
     *
     * @return boolean
     */
    public static function hasLocalBase()
    {
        $res = Schema::hasTable('uf');
        if (!$res) trace_log('Base do republica virtual não instalada - acesse: http://republicavirtual.com.br/cep/ e faça o download da base de dados.');

        return $res;
    }

    /**
     * Busca CEP da base local de CEPs.
     *
     * @param string $cep
     * @return mixed boolean/Array
     */
    private static function getLocalCep($cep)
    {
        $res = Cep::where('cep', $cep)->first();
        return $res;
    }

    /**
     * Insere um registro localmente na base de CEPS (quando é um CEP novo)
     *
     * @param Array $data
     * @return void
     */
    private static function insertLocalCep($data){
        $res = Cep::firstOrCreate($data);
        return $res;
    }

    /**
     * Faz a busca do resultado do serviço web do Republica Virtual.
     *
     * @param [type] $cep
     * @return void
     */
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