<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function file(Request $request)
    {
        $filename = $request->file('file')->store('files');
        
        /*$path = storage_path($filename);
        dd($path);exit;*/

        $file =fopen(storage_path('/app/'.$filename), "r");

        // Recorremos el file mostando el contenido de cada línea:
        while( feof($file) == false )
        {
            $line = strval(fgets($file));
            
            try {                
                //$import = new Import;

                $data[] = $entity_id = substr($line, 0, 5);                
                $data[] = $date_information = substr($line, 5, 6);
                $data[] = $debtor_id = substr($line, 8, 11);
                $data[] = $situation = substr($line, 14, 2);
                $data[] = $debt = substr($line, 16, 12);

                dd($data);exit;
                //$import->save();                
            } catch (\Throwable $th) {
                
            }

        }

        fclose($file);
    }
    
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Import::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
      
        return view('home');
    }
}
