@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">

            <div class="panel-body">
                <h4 class="m-t-0 m-b-30">Edit Banks</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        
                        <div class="m-t-20">
                             <form  action="{{url('/')}}/admin/banks/{{$banks->bankId}}" role="form" id="defaultForm" enctype="multipart/form-data" method="post" >
                              <input type="hidden" name="_method" value="PATCH">
                                 {{ csrf_field() }}
                                 
                                <div class="form-group">
                                    <label>Bank Name</label>
                                   <input type="text" value="{{$banks->bankName}}" class="form-control" id="BankName" name="BankName" required>
                                </div>
                                 <div class="form-group">
                                    <label>Bank Code</label>
                                     <input type="text" value="{{$banks->bankCode}}" class="form-control" id="bankCode" name="bankCode" required>
                                </div>
                                 <div class="form-group {{ $errors->has('currencyId') ? 'has-error' : ''}}">
                                    {!! Form::label('currencyId', 'Country', ['class' => 'col-sm-12 control-label']) !!}
                                    <br><div class="col-sm-12" style="padding: 0px">
                                        {{ Form::select('currencyId', $country, null,['class' => 'form-control ']) }}
                                        {!! $errors->first('currencyId', '<p class="help-block">:message</p>') !!}
                                    </div>
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
