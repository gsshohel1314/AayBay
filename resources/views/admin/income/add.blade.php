@extends('layouts.admin')
@section('title', 'Add New Income')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Add Income
  @endslot
  <li><a href="{{url('admin/income/create')}}">Add</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/income')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Add Income</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/income')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-th"></i> All Income</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              <div class="panel-body">

                    <div class="form-group {{$errors->has('details')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Income Details <span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="details" value="{{old('details')}}">
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
                          <input type="number" class="form-control" name="amount" value="{{old('amount')}}">
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
                          <input type="text" class="form-control" name="date" id="picker" value="{{old('date')}}">
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
                                <option value="{{$value->id}}">{{$value->name}}</option>
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
                <button type="submit" class="btn btn-sm btn-primary">SUBMIT</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
