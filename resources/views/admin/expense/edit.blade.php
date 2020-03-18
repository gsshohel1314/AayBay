@extends('layouts.admin')
@section('title', $expense->details)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Edit Expense
  @endslot
  <li><a href="{{url('admin/expense/'.$expense->id.'/edit')}}">{{$expense->categoryName->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{url('admin/expense/'.$expense->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title"><i class="fa fa-cubes"></i> Update {{$expense->details}}'s Information</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('admin/expense')}}" class="btn btn-sm btn-primary panel_head_btn"><i class="fa fa-th"></i> All Expense</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                      <div class="form-group {{$errors->has('details')? 'has-error':''}}">
                          <label class="col-sm-3 control-label">Expense Details <span class="req_star">*</span></label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="details" value="{{$expense->details}}">
                            @if ($errors->has('details'))
        											<span class="invalid-feedback mb-0" role="alert">
        													<strong>{{ $errors->first('details') }}</strong>
        											</span>
        									  @endif
                          </div>
                      </div>

                      <div class="form-group {{$errors->has('amount')? 'has-error':''}}">
                          <label class="col-sm-3 control-label">Amount<span class="req_star">*</span></label>
                          <div class="col-sm-7">
                            <input type="number" class="form-control" name="amount" value="{{$expense->amount}}">
                            @if ($errors->has('amount'))
        											<span class="invalid-feedback mb-0" role="alert">
        													<strong>{{ $errors->first('amount') }}</strong>
        											</span>
        									  @endif
                          </div>
                      </div>

                      <div class="form-group {{$errors->has('date')? 'has-error':''}}">
                          <label class="col-sm-3 control-label">Income Date<span class="req_star">*</span></label>
                          <div class="col-sm-7" >
                            <input type="text" class="form-control" name="date" id="picker" value="{{$expense->date}}">
                            @if ($errors->has('date'))
        											<span class="invalid-feedback mb-0" role="alert">
        													<strong>{{ $errors->first('date') }}</strong>
        											</span>
        									  @endif
                          </div>
                      </div>

                      <div class="form-group {{$errors->has('category')? 'has-error':''}}">
                          <label class="col-sm-3 control-label">Income Category <span class="req_star">*</span></label>
                          <div class="col-sm-7">
                            <select class="form-control" name="category">
                                <option value="">Select Income Category</option>
                                @foreach($allCategory as $value)
                                  <option value="{{$value->id}}" @if($value->id==$expense->ex_cat_id) selected @endif>{{$value->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('category'))
                              <span class="invalid-feedback mb-0" role="alert">
                                  <strong></strong>
                              </span>
                            @endif

                          </div>
                      </div>

                </div>

                <div class="panel-footer text-center">
                    <button type="submit" class="btn btn-sm btn-primary">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
