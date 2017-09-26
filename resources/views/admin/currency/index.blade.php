@extends('layouts.admin')

@section('content')
<style type="text/css">
    #datatable_paginate{
    }
</style>
<div class="main-content">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header" style="padding: 0px; margin:0px">
                    <h1 style="padding: 0px; margin:10px">Curreny list</h1>
                     
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
                        <h4 class="m-b-30 m-t-0">Curreny</h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table style="padding: 0px" id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>{{ trans('Country Name') }}</th>
                                        <th>{{ trans('Country Code') }}</th>
                                        <th>{{ trans('Currency Name') }}</th>
                                        <th>{{ trans('Currency Code') }}</th>
                                        <th>{{ trans('Status') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- */$x=0;/* --}}
                                        @foreach($currency as $item)
                                        {{-- */$x++;/* --}}
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $item->countryName }}
                                                <img src="{{ $item->logo24 }}" height="32px" width="32px" alt="{{ $item->countryCode }}" />
                                            </td>
                                            <td>{{ $item->countryCode }}</td>
                                            <td>{{ $item->currencyName }}</td>
                                            <td>{{ $item->currencyCode }}</td>
                                            <td>
                                                <?php
                                                if ($item->status) {
                                                    ?>
                                                    <a href="javascript:;" class="btn-sm btn-primary change" data-id="{{ $item->currencyId }}" data-status="0">Active</a>    
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="javascript:;" class="btn-sm btn-danger-alt change" data-id="{{ $item->currencyId }}" data-status="1">Inactive</a>    
                                                    <?php
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 <div class="pagination"> {!! $currency->appends(['search' => $searchTerm])->render() !!} </div>
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
@section('script')
<script>
    $(document).ready(function () {
        $('.change').click(function (e) {
            e.preventDefault();
            if (confirm('Are you sure ?')) {
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');

                $('.se-pre-con').show();
                $.ajax({
                    type: "GET",
                    url: "{{ url('/admin/changeCountryStatus') }}" + "/" + id + "/" + status,
                    dataType: 'json',
                    success: function (data) {
                        alert(data.message);
                        $('.se-pre-con').hide();
                        if (data.status == '1') {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
</script>
@endsection