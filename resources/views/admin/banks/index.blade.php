@extends('layouts.admin')

@section('content')

<div class="main-content">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header" style="padding: 0px; margin:0px">
                    <h1 style="padding: 0px; margin:10px">Banks list</h1>
                    <a href="{{ url('/admin/banks/create') }}" class="btn btn-info waves-effect waves-light">Add Banks</a>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->

        <!-- start: PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-b-30 m-t-0">Banks</h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table style="padding: 0px" id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                       <th>S.No</th>
                                        <th> Bank Name </th>
                                        <th> Bank Code </th>
                                        <th class="no-sorting">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     {{-- */$x=0;/* --}}
                                        @foreach($banks as $item)
                                        {{-- */$x++;/* --}}
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $item->bankName }}</td>
                                            <td>{{ $item->bankCode }}</td>
                                            <td>
                                               <center>
                                                <a href="{{ url('/admin/banks/' . $item->bankId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit bank"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/banks', $item->BankId],
                                                'style' => 'display:inline'
                                                ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete bank" />', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Delete bank',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                                ));!!}
                                                {!! Form::close() !!}
                                                </center>
                                            </td>
                                        </tr>
                                        @endforeach
                                   
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- End Row -->
      
       
        <!-- end: PAGE CONTENT-->
    </div>
</div>

@endsection
