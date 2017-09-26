@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">

            <div class="panel-body">
                <h4 class="m-t-0 m-b-30">Add Tax</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        
                        <div class="m-t-20">
                             <form action="{{url('/')}}/admin/tax" id="defaultForm" enctype="multipart/form-data" method="POST" >
                                 {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Tax Name</label>
                                    <input type="text" class="form-control" id="taxName" name="taxName" required>
                                </div>
                                <div class="form-group">
                                    <label>Tax Amount</label>
                                    <input type="text" class="form-control" id="taxAmount" name="taxAmount" required>
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
          </div>
      </div>
  </div>
</div>

@section('script_validation')

       
@endsection
@endsection
