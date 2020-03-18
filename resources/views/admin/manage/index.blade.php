@extends('layouts.admin')
@section('title', 'Manage')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Manage Information
  @endslot
  <li><a href="{{url('admin/manage')}}">Manage</a></li>
@endcomponent

<div class="row">
  <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
      <div class="mini-stat clearfix bx-shadow manage-box">
          <span class="mini-stat-icon bg-info"><i class="ion-android-storage"></i></span>
          <div class="mini-stat-info text-right text-muted manage-all">
              <span class="number">
                @if($allIncomeCategory<9)
                  0{{$allIncomeCategory}}
                @else
                  {{$allIncomeCategory}}
                @endif
              </span>
              <span class="name">Income Category</span>
          </div>
          <br/>
          <hr class="m-t-10"/>
          <div class="stats">
              <a href="{{url('admin/income/category')}}"><i class="fa fa-share-square fa-lg"></i> Manage Income Category</a>
          </div>
      </div>
      </div>

      <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
          <div class="mini-stat clearfix bx-shadow manage-box">
              <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
              <div class="mini-stat-info text-right text-muted manage-all">
                  <span class="number">
                    @if($allExpenseCategory<9)
                      0{{$allExpenseCategory}}
                    @else
                      {{$allExpenseCategory}}
                    @endif
                  </span>
                  <span class="name">Expense Category</span>
              </div>
              <br/>
              <hr class="m-t-10"/>
              <div class="stats">
                  <a href="{{url('admin/expense/category')}}"><i class="fa fa-share-square fa-lg"></i> Manage Expense Category</a>
              </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
            <div class="mini-stat clearfix bx-shadow manage-box">
                <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                <div class="mini-stat-info text-right text-muted manage-all">
                    <span class="number">
                      @if($allIncomeRecycle<9)
                        0{{$allIncomeRecycle}}
                      @else
                        {{$allIncomeRecycle}}
                      @endif
                    </span>
                    <span class="name">Income Recycle Bin</span>
                </div>
                <br/>
                <hr class="m-t-10"/>
                <div class="stats">
                    <a href="{{url('admin/recycle/income')}}"><i class="fa fa-share-square fa-lg"></i> Manage Income Recycle Bin</a>
                </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
              <div class="mini-stat clearfix bx-shadow manage-box">
                  <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                  <div class="mini-stat-info text-right text-muted manage-all">
                      <span class="number">
                        @if($allExpenseRecycle<9)
                          0{{$allExpenseRecycle}}
                        @else
                          {{$allExpenseRecycle}}
                        @endif
                      </span>
                      <span class="name">Expense Recycle Bin</span>
                  </div>
                  <br/>
                  <hr class="m-t-10"/>
                  <div class="stats">
                      <a href="{{url('admin/recycle/expense')}}"><i class="fa fa-share-square fa-lg"></i> Manage Expense Recycle Bin</a>
                  </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
                <div class="mini-stat clearfix bx-shadow manage-box">
                    <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                    <div class="mini-stat-info text-right text-muted manage-all">
                        <span class="number">
                          @if($allUserRecycle<9)
                            0{{$allUserRecycle}}
                          @else
                            {{$allUserRecycle}}
                          @endif
                        </span>
                        <span class="name">User Recycle Bin</span>
                    </div>
                    <br/>
                    <hr class="m-t-10"/>
                    <div class="stats">
                        <a href="{{url('admin/recycle/user')}}"><i class="fa fa-share-square fa-lg"></i> Manage User Recycle Bin</a>
                    </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
                  <div class="mini-stat clearfix bx-shadow manage-box">
                      <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                      <div class="mini-stat-info text-right text-muted manage-all">
                          <span class="number">
                            @if($allLoanerRecycle<9)
                              0{{$allLoanerRecycle}}
                            @else
                              {{$allLoanerRecycle}}
                            @endif
                          </span>
                          <span class="name">Loaner Recycle Bin</span>
                      </div>
                      <br/>
                      <hr class="m-t-10"/>
                      <div class="stats">
                          <a href="{{url('admin/recycle/loaner')}}"><i class="fa fa-share-square fa-lg"></i> Manage Loaner Recycle Bin</a>
                      </div>
                  </div>
                </div>

              <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
                  <div class="mini-stat clearfix bx-shadow manage-box">
                      <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                      <div class="mini-stat-info text-right text-muted manage-all">
                          <span class="number">
                            @if($allLoanGiven<9)
                              0{{$allLoanGiven}}
                            @else
                              {{$allLoanGiven}}
                            @endif
                          </span>
                          <span class="name">Loan Given</span>
                      </div>
                      <br/>
                      <hr class="m-t-10"/>
                      <div class="stats">
                          <a href="{{url('admin/loan/given')}}"><i class="fa fa-share-square fa-lg"></i> Manage Loan Given</a>
                      </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-3 manage-box-width">
                    <div class="mini-stat clearfix bx-shadow manage-box">
                        <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                        <div class="mini-stat-info text-right text-muted manage-all">
                            <span class="number">
                              @if($allLoanReceive<9)
                                0{{$allLoanReceive}}
                              @else
                                {{$allLoanReceive}}
                              @endif
                            </span>
                            <span class="name">Loan Receive</span>
                        </div>
                        <br/>
                        <hr class="m-t-10"/>
                        <div class="stats">
                            <a href="{{url('admin/loan/receive')}}"><i class="fa fa-share-square fa-lg"></i> Manage Loan Receive</a>
                        </div>
                    </div>
                  </div>

</div>

@endsection
