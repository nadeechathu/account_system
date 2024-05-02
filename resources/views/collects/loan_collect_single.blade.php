@extends('layouts.main')
@section('title')
Edit Loan Collect Details | Smart Life Investment
@endsection
@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="content-wrapper container-xxl p-0">
            <div class="content-body ">
               <!-- Basic Modals start -->
               <section id="basic-modals">
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body py-1">
                              <div class="row justify-content-end">

                                 <div class="col-9">
                                    <h2> Member Name / code - {{  $loanCollect->member->member_name }} - {{  $loanCollect->member->member_code }}
                                    {{-- @dd($loanCollect); --}}
                                       @if($loanCollect->collect_status == 5)
                                       <span class="badge badge-success fs-6">Completed</span>
                                    @else
                                       <span class="badge badge-secondary fs-6">Pending</span>
                                    @endif
                                    </h2>
                                 </div>

                                 <div class="col-3">
                                    <a href="{{ route('collects.loanCollectCreate') }}" class="btn btn-primary w-100">Add Loan Collect</a>
                                 </div>
                              </div>
                              <div class="demo-inline-spacing">
                                 <!-- Basic trigger modal -->
                                 <div class="basic-modal mt-0">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12 px-3">
                                 <div class="row">

                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_id">Member Name</label>
                                          <input type="text"  class="form-control text-dark" readonly
                                             value="{{  $loanCollect->member->initial_name }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_id">Loan Price</label>
                                          <input type="text"  class="form-control text-dark" readonly
                                             value="{{  $loanCollect->loanPrice->loan_collected }} ">
                                       </div>
                                    </div>


                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_code">
                                          Collect Amount</label>
                                          <input type="text" class="form-control text-dark" readonly
                                             value="{{ $loanCollect->collect_amount }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_rate">
                                          Collect Loan Balance</label>
                                          <input type="text" class="form-control text-dark" readonly
                                             value="{{ $loanCollect->collect_loan_balnce }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="collect_loan_paid_balnce">
                                          Collect Loan Paid Balance</label>
                                          <input type="text" class="form-control text-dark" readonly
                                             value="{{ $loanCollect->collect_loan_paid_balnce }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_documt_charg">Collect Date</label>
                                          <input type="text" class="form-control text-dark" readonly
                                             value="{{ $loanCollect->collect_date }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="collect_settle_week">Collect Settle Week</label>
                                          <input type="text" class="form-control text-dark" readonly
                                             value="{{ $loanCollect->collect_settle_week }}">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="collect_person">
                                          Loan Person</label>
                                          
                                          @foreach($users as $user)
                                          @if($loanCollect->collect_person == $user->id)
                                          <input type="text" class="form-control text-dark" readonly
                                          value="{{ $user->name }}">
                                          @endif
                                      @endforeach

                                         
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- Basic Modals end -->
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
