<?php

namespace app\WebService;
use Illuminate\Support\Facades\Http;

class ALMG{

    /**
     * Envia a url necessaria para consultar os deputados
     *
     * @return array
     */
    public static function consultarDeputado()
    { 
        $url='http://dadosabertos.almg.gov.br/ws/legislaturas/19/deputados/situacao/1?formato=json';

        return ALMG::solicitaApiALMG($url);
    }

    /**
     * Envia a url necessaria para consultar os dados do deputado
     *
     * @param  integer $id
     * @return array
     */
    public static function consultarDadoDeputado($id)
    {
        $url='http://dadosabertos.almg.gov.br/ws/deputados/'.$id.'?formato=json';

        return ALMG::solicitaApiALMG($url);
    }

    /**
    * Envia a url necessaria para consultar os dados da verba indenizatoria
    *
    * @param integer $id
    * @param string  $mes
    * @return array 
    */
    public static function consultarDadoVerbaIndenizatoria($id,$mes)
    {
        $url='http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/'.$id.'/2019/'.$mes.'?formato=json';

        return ALMG::solicitaApiALMG($url);  
    }

    /**
     * Solicita os dados para API da ALMG
     *
     * @param  string $url
     * @return array
     */
    public static function solicitaApiALMG($url)
    {
        $response = Http::get($url);
        $response->json();

        return $response;
    } 
}