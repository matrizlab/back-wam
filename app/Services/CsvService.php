<?php

namespace App\Services;

use Illuminate\Support\Collection;

class CsvService
{ 

    public function getCsvData()
    {

        $csv = explode( "\n", file_get_contents( 'http://tech-test.wamdev.net/' ) );

        $reservas_collection = new Collection();
    
        foreach($csv as $key => $line){
    
            if( !empty($line) ){

                $array_reservas = explode(";", $line );
    
                $reservas_collection->push((object)[
                    'localizador' =>  $array_reservas[0],
                    'huesped'=> $array_reservas[1],
                    'fecha_entrada'=> $array_reservas[2],
                    'fecha_salida'=> $array_reservas[3],
                    'hotel'=> $array_reservas[4],
                    'precio'=> $array_reservas[5],
                    'acciones'=> $array_reservas[6],
                ]);
            }
    
    
        }
        return $reservas_collection;

    }

}