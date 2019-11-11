@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">Importación de archivo</div>
                <div class="panel-body">
                    
                <form action="{{ route('import_file') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="file">Archivo a importar:</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>

                    <button class="btn btn-default pull-right" type="submit">Procesar</button>                    
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
                    
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Entidad</th>                                
                                <th>Deudor</th>
                                <th>Situación</th>
                                <th>Deuda</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>            
            </div>
        </div>        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('import_datatable') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'entity_id', name: 'entity_id'},
                {data: 'date_information', name: 'date_information'},
                {data: 'debtor_id', name: 'debtor_id'},
                {data: 'situation', name: 'situation'},
                {data: 'debt', name: 'debt'},
            ]
        });
    });
</script>
@endsection