@extends('layouts.admin')

@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Welcome!
  @endslot
@endcomponent

  <div class="row">
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                  @if($totalUser<9)
                    0{{$totalUser}}
                  @else
                    {{$totalUser}}
                  @endif
                </span>
                Total Users
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 1px;">
                        </div>
                    </div>
                    <div class="stats">
                        <a href="{{url('admin/user')}}"><i class="fa fa-share-square fa-lg"></i> USERS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">{{$totalIn}}</span>
                Total Income
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 1px;">
                        </div>
                    </div>
                    <div class="stats">
                        <a href="{{url('admin/income')}}"><i class="fa fa-share-square fa-lg"></i> INCOME</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">{{$totalEx}}</span>
                Total Expense
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 1px;">
                        </div>
                    </div>
                    <div class="stats">
                        <a href="{{url('admin/expense')}}"><i class="fa fa-share-square fa-lg"></i> EXPENSE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">{{$totalLoaner}}</span>
                Total Loaners
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 1px;">
                        </div>
                    </div>
                    <div class="stats">
                        <a href="{{url('admin/loaner')}}"><i class="fa fa-share-square fa-lg"></i> LOANERS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 row-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> Last 7 Days Status</h3>
                  </div>
                  <div class="col-md-6 text-right padnone">
                    <a href="{{url('admin/income')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-plus-circle"></i> Income</a>
                    <a href="{{url('admin/expense')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-plus-circle"></i> Expense</a>
                    <a href="{{url('admin/summary')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-plus-circle"></i> Summary</a>
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
                              @foreach($income as $value)
                                <tr>
                                    <td class="date">{{$value->date}}</td>
                                    <td class="category">{{$value->categoryName->name}}</td>
                                    <td class="details">{{$value->details}}</td>
                                    <td class="credit">{{$value->amount}}</td>
                                    <td class="debit">-----</td>
                                </tr>
                                @endforeach

                                @foreach($expense as $value)
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
                                    <th>{{$incomeTotal}}</th>
                                    <th>{{$expenseTotal}}</th>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="5">
                                        Total Saving:
                                        @if($incomeTotal>$expenseTotal)
                                        <span class="total1">{{$incomeTotal-$expenseTotal}}</span>
                                        @else
                                        <span class="total2">{{$incomeTotal-$expenseTotal}}</span>
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


<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Report</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {!! $donut->render() !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Report</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {!! $bar->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
