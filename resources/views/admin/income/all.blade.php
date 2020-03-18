@extends('layouts.admin')
@section('title', 'All Income')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Income
  @endslot
  <li><a href="{{url('admin/income')}}">All</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> Income Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/income/create')}}" class="btn btn-sm btn-success panel_head_btn"><i class="fa fa-th"></i> Add Income</a>
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
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @foreach ($allIncome as $key => $value)
                            <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$value->details}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td>{{$value->categoryName->name}}</td>
                                    <td>{{$value->date}}</td>

                                    <td class="center">
                  									<a class="btn btn-success customUserButton" href="{{ url('admin/income/'.$value->id) }}"><i class="fa fa-search-plus fa-lg"></i></a>

                  									<a class="btn btn-info customUserButton" href="{{ url('admin/income/'.$value->id.'/edit') }}"><i class="fa fa-edit fa-lg"></i></a>

                  									<button class="incomesoftdelete btn btn-danger customUserButton" data-incomesoftdelete="{{url('admin/income/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash fa-lg"></i></button>
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

<!-- Modal for soft delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="incomesoftdelete">
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
