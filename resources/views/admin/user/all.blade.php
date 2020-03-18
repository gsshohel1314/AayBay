@extends('layouts.admin')
@section('title', 'All User')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All User
  @endslot
  <li><a href="{{url('admin/user')}}">All</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> User Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/user/create')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-th"></i> User Registration</a>
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>User Role</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @foreach ($allUser as $key => $value)
                            <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>
                                      <img src="{{ asset('storage/user') }}/{{ $value->image }}" height="30px" width="30px" />
                                    </td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->roleName->name}}</td>
                                    <td>
                                      @if($value->status==true)
                                        <span class="badge bg-primary">Approved</span>
                                      @else
                                        <span class="badge bg-danger">Pending</span>
                                      @endif
                                    </td>
                                    <td>{{$value->created_at}}</td>

                                    <td class="center">
                                    <button class="userapprove userreject btn btn-success customUserButton" data-userstatus="{{ url('admin/user/status/'.$value->id) }}" data-toggle="modal"
                                      @if($value->status==true)data-target="#exampleModalReject"
                                      @else
                                      data-target="#exampleModalApprove"
                                      @endif>
                                      @if($value->status==true)<i class="fa fa-close fa-lg"></i>
                                      @else
                                      <i class="fa fa-check fa-lg"></i>
                                      @endif</button>

                  									<a class="btn btn-success customUserButton" href="{{ url('admin/user/'.$value->id) }}"><i class="fa fa-search-plus fa-lg"></i></a>

                  									<a class="btn btn-info customUserButton" href="{{ url('admin/user/'.$value->id.'/edit') }}"><i class="fa fa-edit fa-lg"></i></a>

                  									<button class="softdelete btn btn-danger customUserButton" data-softdelete="{{url('admin/user/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash fa-lg"></i></button>
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
      <form action="" method="post" id="userapprove">
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
      <form action="" method="post" id="userreject">
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

<!-- Modal for soft delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="softdelete">
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
