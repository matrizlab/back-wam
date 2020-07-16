<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CsvService;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ReservasController extends Controller
{
    private $CsvService;

    public function __construct(CsvService $CsvService){

        $this->CsvService = $CsvService;
    }
    function index(){
        
        // $reservas = $this->CsvService->getCsvData();
        // dd($reservas);
        return view('reservas');
    }

    function action(Request $request){

        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $reservas_collection = $this->CsvService->getCsvData();

                $data = $reservas_collection->filter(function($reserva) use ($query)
                {
                    if (strpos($reserva->localizador,$query) !== false) {
                        return $reserva;
                    }elseif(strpos($reserva->huesped,$query) !== false) {
                        return $reserva;
                    }
                    elseif(strpos($reserva->fecha_entrada,$query) !== false) {
                        return $reserva;
                    }
                    elseif(strpos($reserva->fecha_salida,$query) !== false) {
                        return $reserva;
                    }
                    elseif(strpos($reserva->hotel,$query) !== false) {
                        return $reserva;
                    }
                });
                
            }else{
                $data = $this->CsvService->getCsvData();
            }

            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $array_acciones = explode(" ",$row->acciones);
                    $output .= '
                    <tr>
                    <td>'.$row->localizador.'</td>
                    <td>'.$row->huesped.'</td>
                    <td>'.$row->fecha_entrada.'</td>
                    <td>'.$row->fecha_salida.'</td>
                    <td>'.$row->hotel.'</td>
                    <td>'.$row->precio.'</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <button type="button" class="btn btn-success btn-sm">'.$array_acciones[0].'</button>
                            <button type="button" class="btn btn-warning btn-sm">'.$array_acciones[1].'</button>
                        </div>
                    </td>
                    </tr>';
                }
            }else{
                $output = '<tr>
                        <td align="center" colspan="7">No se encontraron reservas</td>
                        </tr>';
            }
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

            echo json_encode($data);
        }
     
    }
}
