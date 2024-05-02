@extends('layouts.main')
@section('title')
    Update loan | Smart Life Investment
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
                                                    <h2> Update Loan - {{ $loan->member->member_name }} -
                                                        {{ $loan->member->member_code }}</h2>

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

                                                    <form class="form form-vertical"

                                                    action="{{ route('store_loan_update',['id' => $loan->id]) }}"

                                                        method="post" enctype="multipart/form-data">

                                                    {{ csrf_field() }}

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="member_id">Member Name</label>
                                                            <select class="select2 form-control" id="member_id"
                                                                name="member_id" required>

                                                                <option selected disabled value="">----- Select ----
                                                                </option>
                                                                @foreach ($members as $member)
                                                                    @if ($member->id == $loan->member_id)
                                                                        <option value="{{ $member->id }}" selected>
                                                                            {{ $member->initial_name }}</option>
                                                                    @else
                                                                        <option value="{{ $member->id }}">
                                                                            {{ $member->initial_name }}</option>
                                                                    @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_category_id">
                                                                    Loan Name</label>
                                                                <select name="loan_category_id" class="form-control"
                                                                    id="loan_category_id" required>
                                                                    @if ($loan->loan_category_id == 1)
                                                                        <option value="1" selected>Speed Loan</option>
                                                                        <option value="2">Business Loan</option>
                                                                        <option value="3">Micro Loan</option>
                                                                    @elseif($loan->loan_category_id == 2)
                                                                        <option value="1">Speed Loan</option>
                                                                        <option value="2" selected>Business Loan
                                                                        </option>
                                                                        <option value="3">Micro Loan</option>

                                                                        @else
                                                                        <option value="1">Speed Loan</option>
                                                                        <option value="2" >Business Loan
                                                                        </option>
                                                                        <option value="3" selected>Micro Loan</option>

                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="loan_amount">Loan Amount</label>

                                                                <select class="custom-select loanAmount" id="loan_amount"
                                                                name="loan_amount" required>


                                                                    @foreach ($loan_catgories as $loan_category)
                                                                    @if ($loan->loan_amount == $loan_category->id)
                                                                    <option selected value="{{$loan_category->id}}">{{$loan_category->loan_category_amount}}</option>
                                                                    @else
                                                                    <option value="{{$loan_category->id}}">{{$loan_category->loan_category_amount}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                 </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="loan_interst_rate">
                                                                    Loan Rate</label>

                                                                    <input type="text"  class="form-control" name="loan_rate"  id="loan_rate"
                                                                    value="{{ $loan->loan_rate }}" readonly required>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="loan_settle_week">
                                                                    Loan Settle Week</label>


                                                                <input type="text"  class="form-control" name="loan_settle_week"  id="loan_settle_week"
                                                                value="{{ $loan->loan_settle_week }}" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="loan_category_def_docharg">
                                                                    Doc Charger</label>

                                                                    <input type="text"  class="form-control" name="loan_documt_charg"  id="loan_category_def_docharg"
                                                                    value="{{ $loan->loan_documt_charg }}" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="loan_collected">
                                                                    Loan Collected</label>

                                                                <input type="text"  class="form-control" name="loan_collected"  id="loan_collected"
                                                                value="{{ $loan->loan_collected }}" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="loan_collected">
                                                                    Loan Renal</label>

                                                                <input type="text"  class="form-control" name="loan_rental"  id="loan_rental"
                                                                value="{{ $loan->loan_rental }}" readonly required>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_issus_date">Loan Issues Date</label>


                                                                <input type="text"  class="form-control" name="loan_issus_date"  id="loan_issus_date"
                                                                value="{{ $loan->loan_issus_date }}"  required>


                                                            </div>
                                                        </div>

                                                         <div class="col-12">
                                                            <div class="form-group">
                                                               <label for="executive_person">
                                                                Collect Person</label>
                                                             <select name="executive_person" class="form-control" id="executive_person" >
                                                               <option {{$loan->executive_person == 1 ? 'selected' : ''}} value="1">Thiwanka Senarath</option>
                                                               <option {{$loan->executive_person == 2 ? 'selected' : ''}} value="2">Indika Anura</option>
                                                               <option {{$loan->executive_person == 3 ? 'selected' : ''}} value="3">Tharindu Dilshan</option>
                                                               <option {{$loan->executive_person == 4 ? 'selected' : ''}} value="4">Visuka Gayashan</option>
                                                           </select>
                                                            </div>
                                                         </div>

                                                         @canany('Loan Status Area')
                                                         <div class="col-12">
                                                            <div class="form-group">
                                                               <label for="loan_status">
                                                                Loan Status Change</label>
                                                             <select name="loan_status" class="form-control" id="loan_status" >
                                                               <option value="">--- Select Loan Status ---</option>
                                                               <option {{$loan->loan_status == 2 ? 'selected' : ''}}  value="2">Loan Pending</option>
                                                               <option {{$loan->loan_status == 1 ? 'selected' : ''}}  value="1">Loan Activate</option>
                                                               <option {{$loan->loan_status == 3 ? 'selected' : ''}}  value="3">Loan Reject</option>
                                                               <option {{$loan->loan_status == 5 ? 'selected' : ''}}  value="5">Loan Settlement</option>
                                                           </select>
                                                            </div>
                                                         </div>
                                                         @endcanany

                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update
                                                                Loan</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $("#loan_category_id").on('change', function() {

            $('.loanAmount').html('');
            $('.loanAmount').append(
                '<option selected="" disabled="" value="">Please Select Loan Amount</option>');
            var loan_category_id = this.value;

            $.ajax({
                type: 'GET',
                url: "{{ url('get-loan-amount') }}/" + loan_category_id,

                success: function(response) {

                    $.each(response.loan_amount, function(key, value) {
                        $('.loanAmount').append($('<option>', {
                            value: value.id,
                            text: value.loan_category_amount,
                        }));
                    });
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    console.log('Error:', error);
                }
            });

        });

        $("#loan_amount").on('change', function() {



            var loan_rate_id = this.value;
            var loanAmoutValue = $('#loan_amount option:selected').text();



            $.ajax({
                type: 'GET',
                url: "{{ url('get-loan-rate') }}/" + loan_rate_id,
                success: function(response) {
                    console.log(response);
                    $('#loan_rate').val('');
                    $('#loan_settle_week').val('');
                    $('#loan_category_def_docharg').val('');
                    $('#loan_collected').val('');
                    $('#loan_rate').val(response.loan_interst_rate.loan_interst_rate);
                    $('#loan_settle_week').val(response.loan_interst_rate.loan_duration);
                    $('#loan_category_def_docharg').val(response.loan_interst_rate
                        .loan_category_def_docharg);

                    var rateValue = response.loan_interst_rate.loan_interst_rate;
                    var durationValue = response.loan_interst_rate.loan_duration;
                    var doChargeValue = response.loan_interst_rate.loan_category_def_docharg;

                    var collectSumIn = (loanAmoutValue * rateValue) / 100;
                    var collectSum = parseFloat(loanAmoutValue) + parseFloat(collectSumIn);
                    $('#loan_collected').val(collectSum);

                    var loanRentalSum = parseFloat(collectSum) / parseFloat(durationValue);

                    var formattedLoanRentalSum = loanRentalSum.toFixed(2);

                    $('#loan_rental').val(formattedLoanRentalSum);



                },
                error: function(xhr, status, error) {

                    console.log('Error:', error);
                }
            });

        });
    </script>
@endsection
