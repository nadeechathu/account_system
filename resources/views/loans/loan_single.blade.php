@extends('layouts.main')
@section('title')
Loan View | Smart Life Investment
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
                              <div class="mb-12">
                                 @include('common.alerts')
                              </div>
                              <div class="row justify-content-end">
                                 <div class="col-9">
                                    <h2> Member Name / code - {{ $loan->member->member_name }} - {{ $loan->member->member_code }}
                                       @if($loan->loan_status == 0)
                                       <span class="badge badge-danger fs-6">Delete</span>
                                    @elseif ($loan->loan_status == 1)
                                       <span class="badge badge-success fs-6">Active</span>
                                       @elseif ($loan->loan_status == 2)
                                       <span class="badge badge-warning fs-6">Pending</span>
                                       @elseif ($loan->loan_status == 3)
                                       <span class="badge badge-danger fs-6">Reject</span>
                                       @elseif ($loan->loan_status == 5)
                                       <span class="badge badge-secondary fs-6">Loan Settelemt</span>
                                    @endif
                                 </h2>
                                 </div>
                                 <div class="col-3">
                                    <a href="{{ route('loan.createUI') }}" class="btn btn-primary w-100">
                                        Add Loan   </a>
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
                                           <label for="center_id">Branch</label>

                                           <input type="text"  class="form-control" readonly
                                           value="{{ $loanSet_branch_Id->branch_name }} ">
                                        </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                               <label for="center_id">Center</label>

                                               <input type="text"  class="form-control" readonly
                                               value="{{ $loanSet_center_Id->center_name }} ">
                                            </div>
                                            </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                       <label for="center_id">Loan Category</label>

                                       @if($loan->loan_category_id == 1)

                                       <input type="text"  class="form-control" readonly
                                       placeholder="Speed Loan">
                                      @elseif($loan->loan_category_id == 2)

                                      <input type="text"  class="form-control" readonly
                                      placeholder="Business Loan">
                                       @else

                                       <input type="text"  class="form-control" readonly
                                       placeholder="Micro Loan">
                                   @endif
                                    </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_code">
                                         Loan Amount</label>
                                          <input type="text"  class="form-control" readonly
                                             value="{{ $loanCollectAmount->loan_category_amount }}">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_rate">
                                          Loan Rate</label>
                                          <input type="text"  class="form-control" readonly
                                             value="{{ $loan->loan_rate }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_settle_week">
                                         Loan Settle Week</label>
                                          <input type="text"  class="form-control" readonly
                                             value="{{ $loan->loan_settle_week }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_documt_charg">Loan Doc Charge</label>
                                          <input type="text"  class="form-control" readonly
                                             value="{{ $loan->loan_documt_charg }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_collected">Loan Collected</label>
                                          <input type="text"  class="form-control" readonly
                                             value="{{ $loan->loan_collected }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_rental">
                                            Loan Rental</label>
                                          <input type="text"  class="form-control" readonly
                                             value="{{ $loan->loan_rental }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="loan_issus_date">Loan Issues
                                          Date</label>
                                          <input type="text"  class="form-control" readonly
                                             value="{{ $loan->loan_issus_date }} ">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="executive_person">
                                           Collect Person</label>
                                        <select name="executive_person" class="form-control" id="executive_person" disabled >
                                          <option {{$loan->executive_person == 1 ? 'selected' : ''}} value="1">Thiwanka Senarath</option>
                                          <option {{$loan->executive_person == 2 ? 'selected' : ''}} value="2">Indika Anura</option>
                                          <option {{$loan->executive_person == 3 ? 'selected' : ''}} value="3">Tharindu Dilshan</option>
                                          <option {{$loan->executive_person == 4 ? 'selected' : ''}} value="4">Visuka Gayashan</option>
                                      </select>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="executive_person">
                                          Loan Status</label>
                                        <select name="executive_person" class="form-control" id="executive_person" disabled >
                                          <option {{$loan->loan_status == 1 ? 'selected' : ''}}  value="1">Loan Activate</option>
                                          <option {{$loan->loan_status == 2 ? 'selected' : ''}}  value="1">Loan Pending</option>
                                          <option {{$loan->loan_status == 3 ? 'selected' : ''}}  value="3">Loan Reject</option>
                                          <option {{$loan->loan_status == 4 ? 'selected' : ''}}  value="4">Loan Settlement</option>
                                          <option {{$loan->loan_status == 5 ? 'selected' : ''}}  value="5">Loan Completed</option>
                                      </select>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
