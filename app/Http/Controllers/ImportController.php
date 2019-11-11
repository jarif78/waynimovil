<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function file(Request $request)
    {
        $file = fopen("datos.txt","rb");

        // Recorremos el file mostando el contenido de cada línea:
        while( feof($file) == false )
        {
            echo fgets($file). "<br />";

            $import = new Import;
            $import->entity_id = substr(fgets($file), 0, 5);
            $import->date_information = substr(fgets($file), 6, 12);
            $import->debtor_id = substr(fgets($file), 16, 27);
            $import->situation = substr(fgets($file), 32, 34);
            $import->debt = substr(fgets($file), 35, 47);
            $import->save();
        }

        fclose($file);
    }
}
