@extends('layouts.app')

@section('styles')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="container">

    @if (session('msg'))
    <div class="row">
        @if (session('status') == 'success')
        <div class="alert alert-success">
        @else ()
        <div class="alert alert-danger">
        @endif
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ session('msg') }}
        </div>    
    </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Importar archivo de deudores del BCRA</strong></div>
                <div class="panel-body">
                    
                <form action="{{ route('import_file') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" class="form-control-file" id="file" name="file"> 
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-sm pull-right" type="submit">Importar</button>  
                        </div>
                    </div>                                   
                </form>

                </div>            
            </div>
        </div>        
    </div>

    <div class="row">
        <div class="col">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Registros Importados</strong></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">                    
                        <table class="table table-bordered" id="data-table-imports">
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

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Registros Deudores</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="data-table-debtors">
                            <thead>
                                <tr>
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
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Registros Entidades</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="data-table-entities">
                            <thead>
                                <tr>        
                                    <th>Entidad</th>
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
        var table = $('#data-table-imports').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('import_datatable') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'date_information', name: 'date_information'},
                {data: 'entity_id', name: 'entity_id'},                
                {data: 'debtor_id', name: 'debtor_id'},
                {data: 'situation', name: 'situation'},
                {data: 'debt', name: 'debt'},
            ]
        });

        var table = $('#data-table-debtors').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('import_datatable_debtors') }}",
            columns: [               
                {data: 'debtor_id', name: 'debtor_id'},
                {data: 'situation', name: 'situation'},
                {data: 'debt', name: 'debt'},
            ]
        });

        var table = $('#data-table-entities').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('import_datatable_entities') }}",
            columns: [
                {data: 'entity_id', name: 'entity_id'},   
                {data: 'debt', name: 'debt'},
            ]
        });
    });
</script>
@endsection