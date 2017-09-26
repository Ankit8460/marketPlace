@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">

            <div class="panel-body">
                <h4 class="m-t-0 m-b-30">Add Banks</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        
                        <div class="m-t-20">
                             <form action="{{url('/')}}/admin/banks" id="defaultForm" enctype="multipart/form-data" method="POST" >
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control" id="bankName" name="bankName" required>
                                </div>
                                 <div class="form-group">
                                    <label>Bank Code</label>
                                    <input type="text" class="form-control" id="bankCode" name="bankCode" required>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

@endsection
@endsection
