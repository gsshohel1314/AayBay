@extends('layouts.admin')
@section('title', 'Income and Expense')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Searching Information
  @endslot
  <li><a href="{{url('admin/summary/search/'.$from.'/'.$to)}}">All</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> Searching: <span class="fromdate">{{$from}}</span> <span class="tospan">to</span> <span class="todate">{{$to}}</span></h3>
                  </div>
                  <div class="col-md-6 text-right padnone">
                    <a href="{{url('admin/summary')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-th"></i> Summary</a>
                  </div>

                  <div class="clearfix"></div>
                </div>
            </div>

            <div class="panel-body">
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
