@extends('layouts.main')
@section('title')
Member Details Update | Smart Life Investment
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
                                    <h2>View Member - {{ $member->member_name }} </h2>
                                 </div>
                                 <div class="col-3">
                                    {{-- <a href="{{ route('member.createUI') }}" class="btn btn-primary w-100">Add Member</a> --}}
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


                                <form class="form form-vertical"

                                action="{{ route('store_member_update',['id' => $member->id]) }}"

                                    method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                 <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                       <label for="center_id">Center Name</label>
                                       <select class="form-control" id="center_id" name="center_id">

                                        @foreach ($centers as $centerType)

                                        <option  {{$centerType->id == $member->center_id ? 'selected':''}} value="{{ $centerType->id}}">{{ $centerType->center_name }} - {{  $centerType->branch->branch_name }}</option>

                                @endforeach

                                </select>

                                    </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_code">
                                        Loan Category Name</label>
                                        <select name="" class="form-control" id=""  disabled >
                                          <option {{$member->loan_category_id == 1 ? 'selected' : ''}} value="1">Speed Loan</option>
                                          <option {{$member->loan_category_id == 2 ? 'selected' : ''}} value="2">Business Loan</option>
                                          <option {{$member->loan_category_id == 3 ? 'selected' : ''}} value="3">Micro Loan</option>

                                      </select>
                                       </div>
                                    </div>
                                    <input type="text" name="member_id" value="{{ $member->id}}" hidden id="">
                                    <input type="text" name="loan_category_id" value="{{ $member->loan_category_id}}" hidden id="">
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_code">
                                          Member Code</label>
                                          <input type="text"  class="form-control" name="member_code"  id="member_code"
                                          value="{{ $member->member_code }}">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_name">
                                          Member Name</label>
                                          <input type="text"  class="form-control" name="member_name"  id="member_name"
                                             value="{{ $member->member_name }}">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="initial_name">
                                          Initial Name</label>
                                          <input type="text"  class="form-control" name="initial_name"  id="initial_name"
                                             value="{{ $member->initial_name }}">
                                       </div>
                                    </div>




                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_phone_no">
                                          Member Phone Number</label>
                                          <input type="text"  class="form-control" name="member_phone_no"  id="member_phone_no"
                                             value="{{ $member->member_phone_no }}" maxlength="10"
                                             oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_address">Member Address</label>
                                          <input type="text"  class="form-control" name="member_address"  id="member_address"
                                             value="{{ $member->member_address }}">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_nic">Member NIC</label>
                                          <input type="text"  class="form-control" name="member_nic"  id="member_nic"
                                             value="{{ $member->member_nic }}">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_group_no">
                                          Member Group Number</label>
                                          <input type="text"  class="form-control" name="member_group_no"  id="member_group_no"
                                             value="{{ $member->member_group_no }}">
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label for="member_register_date">Member Register
                                          Date</label>
                                          <input type="text"  class="form-control" name="member_register_date"  id="member_register_date"
                                             value="{{ $member->member_register_date }}">



                                       </div>
                                    </div>













                                    @if ($member->loan_category_id == 2 || $member->loan_category_id == 1)
                                    <div class="form-row" id="speedLoanShow">
                                       <div class="card1">
                                          <div class="col-12">
                                             <div class="row">
                                                <div class="col-6">
                                                   <h2>Guarantor 01</h2>
                                                </div>
                                                <div class="col-6">
                                                   <h2>Guarantor 02</h2>
                                                </div>
                                                <div class="col-6">
                                                   <div class="form-group">
                                                      <label for="guarantor_01_name">Guarantor
                                                      Name 1</label>
                                                      <input type="text"  class="form-control" name="guarantor_01_name"
                                                      value="{{ $guarantor->guarantor_01_name }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_01_nic">Guarantor NIC
                                                      1</label>
                                                      <input type="text"  class="form-control" name="guarantor_01_nic"
                                                      value="{{ $guarantor->guarantor_01_nic }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_01_phone">Guarantor
                                                      Phone 1</label>
                                                      <input type="text"  class="form-control" name="guarantor_01_phone"
                                                      value="{{ $guarantor->guarantor_01_phone }}" maxlength="10"
                                                      oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_01_address">Guarantor
                                                      Address 1</label>
                                                      <input type="text"  class="form-control" name="guarantor_01_address"
                                                      value="{{ $guarantor->guarantor_01_address }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label
                                                         for="guarantor_01_birthday">Guarantor
                                                      Birthday 1</label>
                                                      <input type="text"  class="form-control" name="guarantor_01_birthday"
                                                      value="{{ $guarantor->guarantor_01_birthday }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_01_age">Guarantor Age
                                                      1</label>
                                                      <input type="text"  class="form-control" name="guarantor_01_age"
                                                      value="{{ $guarantor->guarantor_01_age }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_01_job">Guarantor Job
                                                      1</label>
                                                      <input type="text"  class="form-control" name="guarantor_01_job"
                                                      value="{{ $guarantor->guarantor_01_job }}">
                                                   </div>
                                                </div>
                                                <div class="col-6">
                                                   <div class="form-group">
                                                      <label for="guarantor_02_name">Guarantor
                                                      Name 2</label>
                                                      <input type="text"  class="form-control" name="guarantor_02_name"
                                                      value="{{ $guarantor->guarantor_02_name }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_02_nic">Guarantor NIC
                                                      2</label>
                                                      <input type="text"  class="form-control" name="guarantor_02_nic"
                                                      value="{{ $guarantor->guarantor_02_nic }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_02_phone">Guarantor
                                                      Phone 2</label>
                                                      <input type="text"  class="form-control" name="guarantor_02_phone"
                                                      value="{{ $guarantor->guarantor_02_phone }}" maxlength="10"
                                                      oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_02_address">Guarantor
                                                      Address 2</label>
                                                      <input type="text"  class="form-control" name="guarantor_02_address"
                                                      value="{{ $guarantor->guarantor_02_address }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label
                                                         for="guarantor_02_birthday">Guarantor
                                                      Birthday 2</label>
                                                      <input type="text"  class="form-control" name="guarantor_02_birthday"
                                                      value="{{ $guarantor->guarantor_02_birthday }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_02_age">Guarantor Age
                                                      2</label>
                                                      <input type="text"  class="form-control" name="guarantor_02_age"
                                                      value="{{ $guarantor->guarantor_02_age }}">
                                                   </div>
                                                   <div class="form-group">
                                                      <label for="guarantor_02_job">Guarantor Job
                                                      2</label>
                                                      <input type="text"  class="form-control" name="guarantor_02_job"
                                                      value="{{ $guarantor->guarantor_02_job }}">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    @else
                                    <div class="col-12"  id="otherLoanShow">
                                       <div class="card1">
                                          <div class="row">
                                             <div class="col-6">
                                                <label for="guarantor_member_1">Guarantor
                                                Member 01</label>

                                                <select class="select2 form-control" id="guaran3ber_1"
                                                name="guarantor_member_1" required>

                                                <option selected disabled value="">----- Select ----
                                                </option>
                                                @foreach ($members as $member)
                                                  @if ($member->id == $guarantor->guarantor_member_1)
                                                        <option value="{{ $member->id }}" selected>
                                                            {{ $member->member_name }}</option>
                                                    @else
                                                        <option value="{{ $member->id }}">
                                                            {{ $member->member_name }}</option>
                                                    @endif
                                                @endforeach

                                            </select>







                                             </div>
                                             <div class="col-6">
                                                <label for="guarantor_member_1">Guarantor
                                                Member 01</label>


                                                <select class="select2 form-control" id="guaratr_1"
                                                name="guarantor_member_2" required>

                                                <option selected disabled value="">----- Select ----
                                                </option>
                                                @foreach ($members as $member)
                                                  @if ($member->id == $guarantor->guarantor_member_2)
                                                        <option value="{{ $member->id }}" selected>
                                                            {{ $member->member_name }}</option>
                                                    @else
                                                        <option value="{{ $member->id }}">
                                                            {{ $member->member_name }}</option>
                                                    @endif
                                                @endforeach

                                            </select>

                                             </div>
                                             <div class="form-group pt-1">
                                                <label for="member_relationship">Member
                                                Relationship</label>
                                                <select name="member_relationship" class="form-control"
                                                id="member_relationship" >
                                                @if ($guarantor->member_relationship == 1)
                                                <option value="1" selected>Son</option>
                                                <option value="2">Husband</option>
                                                <option value="3">Wife</option>
                                            @elseif($guarantor->member_relationship == 2)
                                                <option value="1">Son</option>
                                                <option value="2" selected>Husband
                                                </option>
                                                <option value="3">Wife</option>

                                                @else
                                                <option value="1">Son</option>
                                                <option value="2">Husband
                                                </option>
                                                <option value="3" selected>Wife</option>

                                            @endif

                                                </select>

                                             </div>
                                             <div class="form-group">
                                                <label for="member_relationship_pserson_name">Personal
                                                Name</label>
                                                <input type="text"  class="form-control" name="member_relationship_pserson_name"
                                                   value="{{ $guarantor->member_relationship_pserson_name }}">
                                             </div>
                                             <div class="form-group">
                                                <label for="member_relationship_pserson_nic">Personal
                                                NIC </label>
                                                <input type="text"  class="form-control" name="member_relationship_pserson_nic"
                                                   value="{{ $guarantor->member_relationship_pserson_nic }}">
                                             </div>
                                             <div class="form-group">
                                                <label for="member_relationship_pserson_phone">Personal
                                                Phone</label>
                                                <input type="text"  class="form-control" name="member_relationship_pserson_phone"
                                                   value="{{ $guarantor->member_relationship_pserson_phone }}" maxlength="10"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    @endif







                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update</button>
                                        <button type="reset"
                                            class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                 </div>
                                </form>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
