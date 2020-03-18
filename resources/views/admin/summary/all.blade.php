@extends('layouts.admin')
@section('title', 'Income and Expense')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Summary Information
  @endslot
  <li><a href="{{url('admin/summary')}}">All</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> Monthly Summary</h3>
                  </div>
                  <div class="col-md-6 text-right padnone">
                    <a href="{{url('admin/income')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-plus-circle"></i> Income</a>
                    <a href="{{url('admin/expense')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-plus-circle"></i> Expense</a>
                  </div>

                  <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel-body">

              <div class="col-md-9">
                  <form action="" method="post">
                      {{csrf_field()}}
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <div class="input-group input_box">
                                      <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i> From
                                        </div>
                                      <input type="text" name="from" class="form-control" id="pickerForm">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <div class="input-group input_box">
                                      <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i> To
                                        </div>
                                      <input type="text" name="to" class="form-control" id="pickerTo">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-1">
                              <div class="input-group">
                                  <input type="button" class="btn btn-primary btn-md btn-fill btnu" id="search" value="SEARCH">
                              </div>
                          </div>
                        </div>
                  </form>
              </div>
              <div class="col-md-3 full_month">
                  <p>Year : <span>{{$year}}</span></p>
              </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="summary" class="table table-striped table-bordered table_customize table_summary">
                            <thead>
                                <tr>
                                  <th class="date">Date</th>
                                  <th class="category">Category</th>
                                  <th class="details">Details</th>
                                  <th class="credit">Credit</th>
                                  <th class="debit">Debit</th>
                                </tr>
                            </thead>

                            <tbody>
                              @foreach ($income as $key => $value)
                                <tr>
                                    <td class="date">{{$value->date}}</td>
                                    <td class="category">{{$value->categoryName->name}}</td>
                                    <td class="details">{{$value->details}}</td>
                                    <td class="credit">{{$value->amount}}</td>
                                    <td class="debit">-----</td>
                                </tr>
                                @endforeach

                                @foreach ($expense as $key => $value)
                                  <tr>
                                      <td class="date">{{$value->date}}</td>
                                      <td class="category">{{$value->categoryName->name}}</td>
                                      <td class="details">{{$value->details}}</td>
                                      <td class="credit">-----</td>
                                      <td class="debit">{{$value->amount}}</td>
                                  </tr>
                                  @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="total">Total</th>
                                    <th>{{$totalIncome}}</th>
                                    <th>{{$totalExpense}}</th>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="5">
                                        Total Saving:
                                        @if($totalIncome>$totalExpense)
                                        <span class="total1">{{$totalIncome-$totalExpense}}</span>
                                        @else
                                        <span class="total2">{{$totalIncome-$totalExpense}}</span>
                                        @endif
                                    </th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
