@extends('layouts.admin')
@section('title', $incomeCategory->name)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Show Income Category
  @endslot
  <li><a href="{{url('admin/income/category/'.$incomeCategory->id)}}">{{$incomeCategory->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> {{$incomeCategory->name}}'s Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/income/category')}}" class="btn btn-sm btn-primary panel_head_btn"><i class="fa fa-th"></i> All Category</a>
                  </div>
                  <div class="clearfix">
                </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <table class="table table-striped table-bordered view-table-custom">
                      <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$incomeCategory->name}}</td>
                      </tr>

                      <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                          @if($incomeCategory->status==true)
                            <span class="badge bg-primary">Published</span>
                          @else
                            <span class="badge bg-danger">Unpublished</span>
                          @endif
                        </td>
                      </tr>

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
@endsection
