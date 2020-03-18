@extends('layouts.admin')
@section('title', $loaner->name)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Edit Loaner
  @endslot
  <li><a href="{{url('admin/loaner/'.$loaner->id.'/edit')}}">{{$loaner->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/loaner/'.$loaner->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Update {{$loaner->name}}'s Informationr</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/loaner')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-th"></i> All Loaner</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              <div class="panel-body">

                    <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" value="{{$loaner->name}}">
                          @if ($errors->has('name'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('name') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                          <input type="email" class="form-control" name="email" value="{{$loaner->email}}" disabled>
                          @if ($errors->has('email'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('email') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('phone')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="phone" value="{{$loaner->phone}}">
                          @if ($errors->has('phone'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('phone') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('image')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">User Image</label>
                        <div class="col-sm-7">
                          <input type="file" name="image">
                          <br>
                          <label>
                            <img src="{{ asset('storage/loaner') }}/{{ $loaner->image }}" height="60px" width="60px" />
                          </label>
                          @if ($errors->has('image'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('image') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div>

              </div>

              <div class="panel-footer text-center">
                <button type="submit" class="btn btn-sm btn-primary">SAVE</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
