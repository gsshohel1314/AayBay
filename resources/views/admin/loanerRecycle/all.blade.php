@extends('layouts.admin')
@section('title', 'All Recycle Bin Loaner')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Loaner Recycle Bin
  @endslot
  <li><a href="{{url('admin/recycle/loaner')}}">All</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> All Recycle Loaner Information</h3>
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

                            @foreach ($allRecycleLoaner as $value)
                            <tbody>
                                <tr>
                                  <td>{{$value->name}}</td>
                                  <td>{{$value->email}}</td>
                                  <td>{{$value->phone}}</td>
                                  <td>
                                    <img src="{{ asset('storage/loaner') }}/{{ $value->image }}" height="30px" width="30px" />
                                  </td>
                                  <td>{{$value->status}}</td>
                                  <td>{{$value->created_at}}</td>

                                  <td class="center">
                  									<a class="btn btn-success customUserButton" href="{{ url('admin/recycle/loaner/show/'.$value->id) }}"><i class="fa fa-search-plus fa-lg"></i></a>

                  									<a class="loanerrestore btn btn-info customUserButton" data-loanerrestore="{{ url('admin/recycle/loaner/restore/'.$value->id) }}" data-toggle="modal" data-target="#exampleModalRestore"><i class="fa fa-recycle fa-lg"></i></a>

                  									<button class="incomeharddelete btn btn-danger customUserButton" data-incomeharddelete="{{url('admin/recycle/loaner/delete/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash fa-lg"></i></button>
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

<!-- Modal for user restore -->
<div class="modal fade" id="exampleModalRestore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="loanerrestore">
        @csrf
        @method('get')
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4><p class="text-danger">Do you really want to restore loaner?</p></h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Restore</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="incomeharddelete">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-danger">Do you really want to delete these records?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
