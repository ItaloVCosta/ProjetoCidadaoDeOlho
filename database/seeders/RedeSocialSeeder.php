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
        $usoDasRedes=RedeSocialSeeder::dadosRedesSociais();
        
        for($i=0;$i<8;$i++)
        {
            RedeSocial::create([
                'rede_nomes' => $usoDasRedes[$i]["NOME"],
                'quantidade_usuarios' => $usoDasRedes[$i]["usuarios"]
            ]); 
        }
    }

    /**
     * Preenche um array de dados para ser enviados para o banco de dados
     * 
     * @return array
     */
    public function dadosRedesSociais()
    {
        $deputados = ALMG::consultarDeputado();
        $usoDasRedes = array(
            array("ID"=>0, "NOME"=>"Instagram",   "usuarios"=>0),
            array("ID"=>1, "NOME"=>"Facebook",   "usuarios"=>0),
            array("ID"=>2, "NOME"=>"SoundCloud",   "usuarios"=>0),
            array("ID"=>3, "NOME"=>"Twitter",   "usuarios"=>0),
            array("ID"=>4, "NOME"=>"Youtube",   "usuarios"=>0),
            array("ID"=>5, "NOME"=>"WhatsApp",   "usuarios"=>0),
            array("ID"=>6, "NOME"=>"Flickr",   "usuarios"=>0),
            array("ID"=>7, "NOME"=>"LinkedIn",   "usuarios"=>0),
        
        );
        
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