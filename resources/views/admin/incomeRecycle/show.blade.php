@extends('layouts.admin')
@section('title', $recycleIncome->details)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Show Income Recycle Bin
  @endslot
  <li><a href="{{url('admin/recycle/income/show/'.$recycleIncome->id)}}">{{$recycleIncome->categoryName->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> {{$recycleIncome->details}}'s Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/recycle/income')}}" class="btn btn-sm btn-primary panel_head_btn"><i class="fa fa-th"></i> All Recycle Income</a>
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
                        <td>Details</td>
                        <td>:</td>
                        <td>{{$recycleIncome->details}}</td>
                      </tr>

                      <tr>
                        <td>Amount</td>
                        <td>:</td>
                        <td>{{$recycleIncome->amount}}</td>
                      </tr>

                      <tr>
                        <td>Income Category</td>
                        <td>:</td>
                        <td>{{$recycleIncome->categoryName->name}}</td>
                      </tr>

                      <tr>
                        <td>Income Date and Time</td>
                        <td>:</td>
                        <td>{{$recycleIncome->date}}</td>
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
