@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">

            <div class="panel-body">
                

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        
                        <div class="m-t-20">
                             <form action="{{url('/')}}/admin/tax/{{$tax->taxId}}" role="form" id="defaultForm" enctype="multipart/form-data" method="post" >
                                 {{ csrf_field() }}
                                  <div class="form-group">
                                    <label>Tax Name</label>
                                    <input type="text" class="form-control" value="{{$tax->taxName}}" id="taxName" name="taxName" required>
                                </div>
                                <div class="form-group">
                                    <label>Tax Amount</label>
                                    <input type="text" class="form-control"  value="{{$tax->taxAmount}}" id="taxAmount" name="taxAmount" required>
                                </div>
                              
                                <div class="form-group" >
                                    <div>
                                        <button style="margin-top: 10px" type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

</div>

@section('script_validation')

       
@endsection
@endsection
