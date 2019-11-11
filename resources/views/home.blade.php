@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">Importación de archivo</div>
                <div class="panel-body">
                    
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Archivo a importar:</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button class="btn btn-default pull-right">Procesar</button>
                </form>

                </div>            
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de registros</div>
                <div class="panel-body">
                    <p>xxx</p>
                </div>            
            </div>
        </div>        
    </div>
</div>
@endsection
