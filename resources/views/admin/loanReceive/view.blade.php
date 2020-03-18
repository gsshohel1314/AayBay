@extends('layouts.admin')
@section('title', $receiveId->loanReceiveName->name)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Show Loan Receive
  @endslot
  <li><a href="{{url('admin/loan/receive/'.$receiveId->id)}}">{{$receiveId->loanReceiveName->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> {{$receiveId->loanReceiveName->name}}'s Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/loan/receive')}}" class="btn btn-sm btn-primary panel_head_btn"><i class="fa fa-th"></i> All Loan Receive User</a>
                  </div>
                  <div class="clearfix">
                </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <table class="table table-striped table-bordered view-table-custom">
                      <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$receiveId->loanReceiveName->name}}</td>
                      </tr>

                      <tr>
                        <td>Amount</td>
                        <td>:</td>
                        <td>{{$receiveId->amount}}</td>
                      </tr>

                      <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td>{{$receiveId->date}}</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-2"></div>
                </div>
            </div>

            <div class="panel-footer">
              <a href="#" class="btn btn-sm btn-primary">PRINT</a>
              <a href="#" class="btn btn-sm btn-warning">PDF</a>
              <a href="#" class="btn btn-sm btn-info">CSV</a>
            </div>

        </div>
    </div>
</div>
@endsection
