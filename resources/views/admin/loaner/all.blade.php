@extends('layouts.admin')
@section('title', 'All Loaner')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Loaner
  @endslot
  <li><a href="{{url('admin/loaner')}}">All</a></li>
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
                    <a href="{{url('admin/loaner/create')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-th"></i> Loaner Add</a>
                  </div>
                  <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @foreach ($allLoaner as $value)
                            <tbody>
                                <tr>
                                  <td>{{$value->name}}</td>
                                  <td>{{$value->email}}</td>
                                  <td>{{$value->phone}}</td>
                                  <td>
                                    <img src="{{ asset('storage/loaner') }}/{{ $value->image }}" height="30px" width="30px" />
                                  </td>
                                  <td>
                                    @if($value->status==true)
                                      <span class="badge bg-primary">Approved</span>
                                    @else
                                      <span class="badge bg-danger">Pending</span>
                                    @endif
                                  </td>
                                  <td>{{$value->created_at}}</td>

                                  <td class="center">
                                    <button class="loanerapprove loanereject btn btn-success customUserButton" data-loanerstatus="{{ url('admin/loaner/status/'.$value->id) }}" data-toggle="modal"
                                    @if($value->status==true)
                                      data-target="#exampleModalReject"
                                    @else
                                      data-target="#exampleModalApprove"
                                    @endif>
                                    @if($value->status==true)
                                      <i class="fa fa-close fa-lg"></i>
                                    @else
                                      <i class="fa fa-check fa-lg"></i>
                                    @endif</button>

                                    <!-- <a class="loangiven btn btn-primary" href="{{$value->id}}" data-toggle="modal" data-target="#exampleModalGiven">Loan Given</a>

                                    <a class="loanreceive btn btn-warning" href="{{$value->id}}" data-toggle="modal" data-target="#exampleModalReceive">Loan Receive</a> -->

                                    @if($value->status==true)
                                    <a class="btn btn-success customUserButton" href="{{ url('admin/loaner/'.$value->id) }}"><i class="fa fa-search-plus fa-lg"></i></a>
                                    @endif

                  									<a class="btn btn-info customUserButton" href="{{ url('admin/loaner/'.$value->id.'/edit') }}"><i class="fa fa-edit fa-lg"></i></a>

                  									<button class="softdeleteloaner btn btn-danger customUserButton" data-softdeleteloaner="{{url('admin/loaner/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash fa-lg"></i></button>
                  								</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for approve -->
<div class="modal fade" id="exampleModalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="loanerapprove">
        @csrf
        @method('put')
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4><p class="text-danger">Do you really want to approve user request?</p></h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Approve</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for rejected -->
<div class="modal fade" id="exampleModalReject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="loanereject">
        @csrf
        @method('put')
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4><p class="text-danger">Do you really want to reject user request?</p></h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Reject</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Loan Given -->
<div class="modal fade" id="exampleModalGiven" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" id="loangiven" action="{{url('admin/loan/given/create')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Received Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">

                    <input type="hidden" name="loaner_id" class="form-control pop_input_field" id="hiddenVal1" value="">

                    <input type="text" name="amount" class="form-control pop_input_field" id="" value="{{old('amount')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Received Date <span class="req_star">*</span></label>
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

<!-- Modal for Loan Receive -->
<div class="modal fade" id="exampleModalReceive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" id="loanreceive" action="{{url('admin/loan/receive/create')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Received Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">

                    <input type="hidden" name="loaner_id" class="form-control pop_input_field" id="hiddenVal2" value="">

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

<!-- Modal for soft delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="softdeleteloaner">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-danger">Do you really want to move recycle bin these records?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Move</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
