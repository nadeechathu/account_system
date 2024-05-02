@extends('layouts.main')
@section('title')
Add New loan Collect | Smart Life Investment
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
                                <div class="col-12 py-2 text-center d-sm-none">
                                    <a  href="{{ route('dashboard.index') }}" class="text-center border-2 btn btn-info waves-effect waves-float waves-info w-100">Back</a>
                                </div>
                                 <div class="col-lg-9">
                                    <h2>Add Collect </h2>
                                 </div>
                                 <div class="col-3">
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
                                 <form class="form form-vertical" action="{{ route('collects.create')}}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                       <div class="form-group">
                                          <label for="member_id">Member Name</label>
                                          <select  id="member_id"
                                             name="loan_member_id"  class="select2 form-control member_select" required onchange="showSelectedOption()">
                                             <option selected disabled value=""> ----- Select ----</option>
                                             @foreach ($members as $key => $member)
                                             <option value="{{ $member->id }}">{{ $member->initial_name }}  - {{ $member->member_code }} </option>
                                             @endforeach
                                          </select>
                                       </div>

                                       <div class="col-12" hidden>
                                        <div class="form-group">
                                           <label for="loan_id">
                                           Loan ID</label>
                                           <input type="text" class="form-control"  id="loan_id" name="loan_id"  required>
                                        </div>
                                     </div>

                                       <div class="col-12">
                                        <div class="form-group">
                                           <label for="collect_amount">
                                            Collect Amount</label>
                                           <input type="tel" class="form-control"  id="collect_amount" name="collect_amount"  required>
                                        </div>
                                     </div>

                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="collect_loan_balnce">
                                                Loan Due Balance</label>
                                           <input type="text" class="form-control"  id="collect_loan_balnce" name="collect_loan_balnce"  required readonly>

                                        </div>
                                     </div>

                                     <div class="col-12">
                                        <div class="form-group">
                                           <label for="collect_loan_paid_balnce">
                                             Loan Paid Balnce</label>
                                           <input type="text" class="form-control"  id="collect_loan_paid_balnce" name="collect_loan_paid_balnce"  required readonly>

                                        </div>
                                     </div>

                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="collect_date">Collect Date</label>
                                            <input type="date" id="collect_date"
                                                value="{{old('collect_date')}}" name="collect_date"
                                                class="form-control"
                                                placeholder="YYYY-MM-DD" required/>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                           <label for="collect_settle_week">
                                             Settle Week</label>
                                           <input type="text" class="form-control"  id="collect_settle_week" name="collect_settle_week"  required readonly>

                                        </div>
                                     </div>

                                     <div class="col-12">
                                        <div class="form-group">
                                           <label for="collect_person">
                                            Collect Person</label>
                                           {{-- <select name="collect_person" class="form-control" id="collect_person" required>
                                              <option selected disabled value="">--- Collect Person ---</option>
                                              <option value="1">Thiwanka Senarath</option>
                                              <option value="2">Indika Anura</option>
                                              <option value="3">Tharindu Dilshan</option>
                                              <option value="4">Visuka Gayashan</option>
                                           </select> --}}


                                           <select class="form-select " name="collect_person" aria-label="Default select example">
                                            <option selected >--- Collect Person ---</option>


                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
                                          </select>
                                        </div>
                                     </div>

                                     <div class="col-12">
                                        <div class="form-group">
                                           <label for="collect_status">
                                            Collection Status</label>
                                           <select name="collect_status" class="form-control" id="collect_status" required>
                                              <option value="1">Active</option>
                                              <option value="4">Arrears</option>
                                              <option value="7">Under Payment</option>
                                              @canany('Loan Collect Hold')
                                              <option value="6">Hold</option>
                                              @endcanany
                                           </select>
                                        </div>
                                     </div>

                                     <div class="col-12 mx-auto  pb-3">
                                          <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light  ">Collect Loan</button>
                                          <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
function showSelectedOption() {
  var selectedValue = document.getElementById("member_id").value;


  $.ajax({
          type: 'GET',
           url: "{{ url('get-loan') }}/" + selectedValue,
           success: function(response) {
           console.log(response);

           $('#collect_amount').val(response.loanDetails.collect_amount);
           $('#collect_loan_balnce').val(response.loanDetails.collect_loan_balnce);
           $('#collect_loan_paid_balnce').val(response.loanDetails.collect_loan_paid_balnce);
           $('#collect_settle_week').val(response.loanDetails.collect_settle_week);
           $('#loan_id').val(response.loanDetails.loan_id);

           },
           error: function(xhr, status, error) {
               console.log('Error:', error);
           }
       });




}


</script>
@endsection
