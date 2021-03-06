<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RedeSocial;
use \App\WebService\ALMG;

class RedeSocialSeeder extends Seeder
{
    /**
     * Roda a seed do banco de dados
     *
     * @return void
     */
    public function run()
    {
        $usoDasRedes=$this->dadosRedesSociais();
        for($i=0;$i<8;$i++)
        {
            RedeSocial::create([
                'rede_nomes' => $usoDasRedes[$i]["nome"],
                'quantidade_usuarios' => $usoDasRedes[$i]["usuarios"]
            ]); 
        }
    }

    /**
     * Preenche um array de dados como o numero de usuario de cada Rede Social
     * 
     * @return array
     */
    private function dadosRedesSociais()
    {
        $deputados = ALMG::consultarDeputado();
        $usoDasRedes = [
            ["ID"=>0, "nome" => "Instagram",   "usuarios" => 0],
            ["ID"=>1, "nome" => "Facebook",   "usuarios" => 0],
            ["ID"=>2, "nome" => "SoundCloud",   "usuarios" => 0],
            ["ID"=>3, "nome" => "Twitter",   "usuarios" => 0],
            ["ID"=>4, "nome" => "Youtube",   "usuarios" => 0],
            ["ID"=>5, "nome" => "WhatsApp",   "usuarios" => 0],
            ["ID"=>6, "nome" => "Flickr",   "usuarios" => 0],
            ["ID"=>7, "nome" => "LinkedIn",   "usuarios" => 0],
        ]; 
        foreach($deputados['list'] as $id)
        {
            $dadoDeputado = ALMG::consultarDadoDeputado($id['id']);
            sleep(1);
            foreach($dadoDeputado['deputado']['redesSociais'] as $redeSocial)
            {
                switch(strtolower($redeSocial['redeSocial']['nome']))
                {
                    case 'facebook';
                        $usoDasRedes[0]['usuarios']++;
                        break;
                    case 'instagram';
                        $usoDasRedes[1]['usuarios']++;
                        break;
                    case 'soundcloud';
                        $usoDasRedes[2]['usuarios']++;
                        break;
                    case 'twitter';
                        $usoDasRedes[3]['usuarios']++;
                        break;
                    case 'youtube';
                        $usoDasRedes[4]['usuarios']++;
                        break;
                    case 'whatsapp';
                        $usoDasRedes[5]['usuarios']++;
                        break;
                    case 'flickr';
                        $usoDasRedes[6]['usuarios']++;
                        break;
                    case 'linkedin';
                        $usoDasRedes[7]['usuarios']++;
                        break;
                }
            }    
        } 
        $numUsuarios = array_column($usoDasRedes, 'usuarios');
        array_multisort($numUsuarios, SORT_DESC, $usoDasRedes);
        return $usoDasRedes;
    }
}