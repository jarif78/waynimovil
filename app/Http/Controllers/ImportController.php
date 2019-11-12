<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Import;
use DB;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }    

    public function file(Request $request)
    {
        if(!is_null($request->file('file'))){

            $filename = $request->file('file')->store('files');
            $file =fopen(storage_path('/app/'.$filename), "r");
    
            while( feof($file) == false )
            {
                $line = strval(fgets($file));  
    
                $entity_id = substr($line, 0, 5);                
                $date_information = substr($line, 5, 6);
                $debtor_id = substr($line, 13, 11);
                $situation = substr($line, 27, 2);
                $debt = floatval(str_replace(",", ".", substr($line, 29, 12)));
                
                $flag = DB::table('imports')
                        ->where('entity_id', '=', $entity_id)
                        ->where('date_information', '=', $date_information)
                        ->where('debtor_id', '=', $debtor_id)
                        ->where('situation', '=', $situation)
                        ->where('debt', '=', $debt)
                        ->get();
    
                if(count($flag) == 0){               
                    $import = new Import;
                    $import->entity_id = $entity_id;                
                    $import->date_information = $date_information;
                    $import->debtor_id = $debtor_id;
                    $import->situation = $situation;
                    $import->debt = $debt;
                    $import->save(); 
                }
    
            }
            fclose($file);
            Storage::delete($filename);

            $status = "success";
            $msg = "El archivo se ha procesado";

        }else{
            $status = "danger";
            $msg = "Debe seleccionar un archivo";
        }
    
        return redirect('home')->with([
            'status' => $status,
            'msg'=> $msg
        ]);
    }
    
    public function datatable(Request $request)
    {        
        if ($request->ajax()) {
            return datatables(DB::table('imports'))->toJson();
        }      
        return view('home');
    }

    public function datatable_entities(Request $request)
    {        
        if ($request->ajax()) {
            return datatables(
                DB::select(DB::raw(
                    'SELECT entity_id, sum(debt) AS debt
                    FROM imports
                    GROUP BY entity_id
                    ORDER BY entity_id'
                ))
            )->toJson();
        }      
        return view('home');
    }

    public function datatable_debtors(Request $request)
    {        
        if ($request->ajax()) {
            return datatables(
                DB::select(DB::raw(
                    'SELECT debtor_id, max(situation) AS situation, sum(debt) AS debt
                    FROM imports
                    GROUP BY debtor_id
                    ORDER BY debtor_id'
                ))
            )->toJson();
        }      
        return view('home');
    }
}
