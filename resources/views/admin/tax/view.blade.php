@extends('layouts.admin')

@section('content')

<div class="main-content">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header" style="padding: 0px; margin:0px">
                    <h1 style="padding: 0px; margin:10px">Tax list</h1>
                    <a href="{{ url('/') }}/admin/tax/add" class="btn btn-info waves-effect waves-light">Add Tax</a>
                     
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
                        <h4 class="m-b-30 m-t-0">Tax</h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table style="padding: 0px" id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>SrNo.</th>
                                        <th>Tax Name</th>
                                        <th>Tax Amount</th>
                                        <th class="no-sorting">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($tax as $item)
                                    {{-- */$x=0;/* --}}
                                    {{-- */$x++; $img_path = url('/').'/storage/uploads/customer_profile_image/';/* --}}
                                        <tr>
                                            <td>{{$x}}</td>
                                            <td>{{$item['taxName']}}</td>
                                            <td>{{$item['taxAmount']}}</td>
                                            
                                            <td class="no-sorting">
                                             <a href="{{ url('/admin/tax/' . $item->taxId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit tax"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> 
                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/tax', $item['taxId']],
                                                'style' => 'display:inline'
                                                ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete customer" />', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Delete tax',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                                ));!!}
                                                {!! Form::close() !!}
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
