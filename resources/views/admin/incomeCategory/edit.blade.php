@extends('layouts.admin')
@section('title', $incomeCategory->name)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Edit Income Category
  @endslot
  <li><a href="{{url('admin/income/category/'.$incomeCategory->id.'/edit')}}">{{$incomeCategory->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/income/category/'.$incomeCategory->id)}}" method="post">
        @csrf
        @method('put')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Update {{$incomeCategory->name}}'s Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/income/category')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-th"></i> All Category</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              <div class="panel-body">

                    <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Category Name <span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" value="{{$incomeCategory->name}}">
                          @if ($errors->has('name'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('name') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('status')? 'has-error':''}}">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                          <input type="checkbox" name="status" {{$incomeCategory->status==1 ? 'checked':''}}>
                          <span>Published</span>
                          @if ($errors->has('status'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('status') }}</strong>
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
