@extends('layouts.admin')
@section('title', $loaner->name)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Show Loaner
  @endslot
  <li><a href="{{url('admin/loaner/'.$loaner->id)}}">{{$loaner->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> Loaner Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/loaner')}}" class="btn btn-sm btn-primary panel_head_btn"><i class="fa fa-th"></i> All Loaner</a>
                  </div>
                  <div class="clearfix">
                </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-2 details_pic_part">
                      <img src="{{ asset('storage/loaner') }}/{{ $loaner->image }}" height="150px" width="150px" />
                  </div>
                  <div class="col-md-7 loan-giv-rec-button">
                    <a href="#" class="btn btn-sm btn-info panel_head_btn loan" data-toggle="modal" data-target=".loan_given_part"> Loan Given</a>

                    <a href="#" class="btn btn-sm btn-success panel_head_btn" data-toggle="modal" data-target=".loan_received_part"> Loan Received</a>

                    <table class="table table-striped table-bordered view-table-custom personal-table">
                      <tr>
                          <th colspan="3"><i class="fa fa-user"></i> Personal Information</th>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$loaner->name}}</td>
                      </tr>

                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$loaner->email}}</td>
                      </tr>

                      <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{$loaner->phone}}</td>
                      </tr>


                      <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                          @if($loaner->status==true)
                            <span class="badge bg-primary">Approved</span>
                          @else
                            <span class="badge bg-danger">Pending</span>
                          @endif
                        </td>
                      </tr>

                    </table>

                    <table class="table table-striped table-bordered view-table-custom personal-table">
                      <tr>
                          <th colspan="3"><i class="fa fa-tasks"></i> Payment Information</th>
                      </tr>
                      <tr>
                        <td>Total Payment Amount</td>
                        <td>:</td>
                        <td>{{$totalPayment}}</td>
                      </tr>

                      <tr>
                        <td>Total Received Amount</td>
                        <td>:</td>
                        <td>{{$totalReceive}}</td>
                      </tr>

                      <tr>
                        <td>Total Payable/ Total Due</td>
                        <td>:</td>
                        <td>{{$totalPayment-$totalReceive}}</td>
                      </tr>

                      <tr>
                        <td>Last Payment Date</td>
                        <td>:</td>
                        <td>
                          @if($lastPayDate=='')
                            null
                          @else
                            {{$lastPayDate->date}}
                          @endif
                        </td>
                      </tr>

                      <tr>
                        <td>Last Received Date</td>
                        <td>:</td>
                        <td>
                          @if($lastRecDate=='')
                            null
                          @else
                          {{ $lastRecDate->date }}
                          @endif
                        </td>
                      </tr>

                    </table>

                    <table id="" class="table table-striped table-bordered payment_table">
                        <tr>
                            <th colspan="7"><i class="fa fa-tasks"></i> Payment Status</th>
                        </tr>
                    </table>

                    <table id="summary" class="table table-striped table-bordered table_customize table_payment">
                        <thead>
                            <tr>
                              <th class="pay payment">Payment Date</th>
                              <th class="pay receive">Receive Date</th>
                              <th class="pay credit">Credit</th>
                              <th class="pay debit">Debit</th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach($allReceive as $value)
                            <tr>
                                <td class="payment"></td>
                                <td class="receive">{{$value->date}}</td>
                                <td class="credit">{{$value->amount}}</td>
                                <td class="debit"></td>
                            </tr>
                          @endforeach

                            @foreach($allGiven as $value)
                              <tr>
                                  <td class="payment">{{$value->date}}</td>
                                  <td class="receive"></td>
                                  <td class="credit"></td>
                                  <td class="debit">{{$value->amount}}</td>
                              </tr>
                              @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="total">Total</th>
                                <th>{{$totalReceive}}</th>
                                <th>{{$totalPayment}}</th>
                            </tr>
                            <tr>
                                <th class="text-center" colspan="5">
                                    Total Saving:
                                    @if($totalReceive>$totalPayment)
                                    <span class="total1">{{$totalReceive-$totalPayment}}</span>
                                    @else
                                    <span class="total2">{{$totalReceive-$totalPayment}}</span>
                                    @endif
                                </th>
                            </tr>
                        </tfoot>

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

<!--Loan Given modal code start-->
<div class="modal fade loan_given_part" tabindex="-1" role="dialog" aria-labelledby="loanGivenModalLabel" id="loan_given_part">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal_popup" id="loanGivenModalLabel">Loan Given Information</h4>
      </div>
      <form class="form-horizontal" method="post" action="{{url('admin/loan/given/create')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Given Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="hidden" name="loaner_id" class="form-control pop_input_field" id="" value="{{$loaner->id}}">
                    <input type="text" name="amount" class="form-control pop_input_field" id="" value="{{old('amount')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Given Date <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="date" class="form-control pop_input_field" id="datepicker_given_date" value="{{old('date')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary btn-fill btnu">Save</button>
        <button type="button" class="btn btn-sm btn-default btn-fill btnu" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Loan received modal code start-->
<div class="modal fade loan_received_part" tabindex="-1" role="dialog" aria-labelledby="loanRecModalLabel" id="loan_received_part">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal_popup" id="loanRecModalLabel">Loan Received Information</h4>
      </div>
      <form class="form-horizontal" method="post" action="{{url('admin/loan/receive/create')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Received Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="hidden" name="loaner_id" class="form-control pop_input_field" id="" value="{{$loaner->id}}">
                    <input type="text" name="amount" class="form-control pop_input_field" id="" value="{{old('amount')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Received Date <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="date" class="form-control pop_input_field" id="datepicker_receive_date" value="{{old('date')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary btn-fill btnu">Save</button>
        <button type="button" class="btn btn-sm btn-default btn-fill btnu" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
