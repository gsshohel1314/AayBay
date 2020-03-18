@extends('layouts.admin')
@section('title', 'Expense Recycle Bin')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Show Expense Recycle Bin
  @endslot
  <li><a href="{{url('admin/recycle/expense/show/'.$recycleExpense->id)}}">{{$recycleExpense->categoryName->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> Expense Recycle Bin Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/recycle/expense')}}" class="btn btn-sm btn-primary panel_head_btn"><i class="fa fa-th"></i> All Recycle Expense</a>
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
                        <td>{{$recycleExpense->details}}</td>
                      </tr>

                      <tr>
                        <td>Amount</td>
                        <td>:</td>
                        <td>{{$recycleExpense->amount}}</td>
                      </tr>

                      <tr>
                        <td>Expense Category</td>
                        <td>:</td>
                        <td>{{$recycleExpense->categoryName->name}}</td>
                      </tr>

                      <tr>
                        <td>Expense Date and Time</td>
                        <td>:</td>
                        <td>{{$recycleExpense->date}}</td>
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
