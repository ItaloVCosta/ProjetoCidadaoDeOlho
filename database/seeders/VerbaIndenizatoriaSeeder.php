<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VerbaIndenizatoria;
use \App\WebService\ALMG;

class VerbaIndenizatoriaSeeder extends Seeder
{
    /**
     * Roda a seed do banco de dados
     *
     * @return void
     */
    public function run()
    {
        $verbasAno=$this->dadosVerbaIndenizatoriaAno();

        foreach($verbasAno as $mes)
        {      
            foreach($mes as $deputados)
            {
                foreach($deputados as $deputado)
                {   
                    VerbaIndenizatoria::create([
                        'deputado_ids' => $deputado['id'],
                        'mes' => key($mes),
                        'deputado_nomes' => $deputado['nome'],
                        'reembolso_valores' =>  $deputado['total_reembolso']
                    ]); 
                }
            }
        }
    }

    /**
     * Gera os dados de verba indenizatoria no ano 
     *
     * @return array
     */
    private function dadosVerbaIndenizatoriaAno()
    {
        $deputados = ALMG::consultarDeputado();
        $meses=array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
        $numeroMes=1;     
        foreach($meses as $mes)
        {   if($numeroMes==3 || $numeroMes==4)
            $verbasAno[]=array($mes => $this->dadosVerbaIndenizatoriaMes($deputados,$numeroMes));
            $numeroMes++;  
        }
        return $verbasAno; 
    } 

    /**
     * Gera os dados de verba indenizatoria no mes
     * 
     * @param array $deputados
     * @param integer $numeroMes
     * @return array
     */
    private function dadosVerbaIndenizatoriaMes($deputados,$numeroMes)
    {
        foreach($deputados['list'] as $id)
            {   
                $total=0;
                $verbaIndenizatoria=ALMG::consultarDadoVerbaIndenizatoria($id['id'],$numeroMes);
                sleep(1.2);
                foreach($verbaIndenizatoria['list'] as $despesa)
                    $total += $despesa['valor'];

                $verbasMes[]=array("nome" => $id['nome'],"id" => $id['id'],"total_reembolso" => $total);
            }
            $totalReembolso = array_column($verbasMes, 'total_reembolso');
            array_multisort($totalReembolso, SORT_DESC, $verbasMes);
            array_splice($verbasMes,5,count($verbasMes)-5);
            return $verbasMes;
    }
}



    

