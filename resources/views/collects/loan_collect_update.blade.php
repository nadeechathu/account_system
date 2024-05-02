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
                                 <div class="col-9">
                                    <h2> Member Name / code - {{  $loanCollect->member->initial_name }} - {{  $loanCollect->member->member_code }}</h2>
                                 </div>
                                 <div class="col-3">
                                    <a href="{{ route('collects.loanCollectCreate') }}" class="btn btn-primary w-100">Add Loan Collect</a>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12 px-3">
                                 <form class="form form-vertical"
                                    action="{{ route('collects.update.store',['id' => $loanCollect->id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                       <div class="form-group">
                                          <label for="member_cid">Member Name</label>
                                          <select class="select2 form-control" id="member_id"
                                             name="loan_member_id" required onchange="showSelectedOption()">
                                             <option selected disabled value="">----- Select ----
                                             </option>
                                             @foreach ($members as $member)
                                             @if ($member->id == $loanCollect->member_id)
                                             <option value="{{ $member->id }}" selected>
                                                {{ $member->member_name }}
                                             </option>
                                             @else
                                             <option value="{{ $member->id }}">
                                                {{ $member->member_name }}
                                             </option>
                                             @endif
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-12" hidden>
                                          <div class="form-group">
                                             <label for="loan_id">
                                             Loan ID</label>
                                             <input type="text" class="form-control"  id="loan_id" name="loan_id" value="{{ $loanCollect->loan_id }} " r required>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="collect_amount">
                                             Collect Amount</label>
                                             <input type="text" class="form-control"  id="collect_amount" name="collect_amount"  value="{{ $loanCollect->collect_amount }} " required>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="collect_loan_balnce">
                                             Loan Due Balance</label>
                                             <input type="text" class="form-control"  id="collect_loan_balnce" name="collect_loan_balnce"  required readonly value="{{ $loanCollect->collect_loan_balnce }} ">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="collect_loan_paid_balnce">
                                             Loan Paid Balnce</label>
                                             <input type="text" class="form-control"  id="collect_loan_paid_balnce" name="collect_loan_paid_balnce"  required readonly  value="{{ $loanCollect->collect_loan_paid_balnce }} ">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="collect_date">Collect Date</label>
                                             <input type="text" id="collect_date"
                                                name="collect_date"
                                                class="form-control" value="{{ $loanCollect->collect_date }} "
                                                required/>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="collect_settle_week">
                                             Settle Week</label>
                                             <input type="text" class="form-control"  id="collect_settle_week" name="collect_settle_week"  required readonly value="{{ $loanCollect->collect_settle_week }} ">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="collect_person">
                                             Collect Person</label>
                                             {{-- @foreach($users as $user)
                                          @if($loanCollect->collect_person == $user->id)
                                          <input type="text" class="form-control text-dark" readonly
                                          value="{{ $user->name }}">
                                          @endif
                                      @endforeach --}}



                                      <select class="form-select " name="collect_person" aria-label="Default select example">
                                        <option selected >Select Collect Person</option>
                                       
                                        @foreach($users as $user) 
                                        <option  {{ $loanCollect->collect_person == $user->id ? 'selected':''}} value="{{ $user->id }}"> {{   $user->name }}</option>
 
                                        @endforeach
                                     </select>
                                             {{-- <select name="collect_person" class="form-control" id="collect_person" >
                                             <option {{$loanCollect->collect_person == 1 ? 'selected' : ''}} value="1">Thiwanka Senarath</option>
                                             <option {{$loanCollect->collect_person == 2 ? 'selected' : ''}} value="2">Indika Anura</option>
                                             <option {{$loanCollect->collect_person == 3 ? 'selected' : ''}} value="3">Tharindu Dilshan</option>
                                             <option {{$loanCollect->collect_person == 4 ? 'selected' : ''}} value="4">Visuka Gayashan</option>
                                             </select> --}}
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update Collect Loan</button>
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
