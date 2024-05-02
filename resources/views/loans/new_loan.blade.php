@extends('layouts.main')
@section('title')
    Add New loan | Smart Life Investment
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
                                                <div class="col-12 py-2 text-center">
                                                    <a  href="{{ route('dashboard.index') }}" class="text-center border-2 btn btn-warning waves-effect waves-float waves-info w-100">Home page</a>
                                                </div>
                                                <div class="col-lg-9">
                                                    <h2>View Loan Details
                                                    </h2>
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
                                                <form class="form form-vertical" action="{{ route('loan.create') }}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="member_id">Member Name</label>
                                                            <select id="member_id" name="member_id"
                                                                class="select2 form-control" required>
                                                                <option selected disabled value=""> ----- Select ----
                                                                </option>
                                                                @foreach ($members as $key => $member)
                                                                    <option value="{{ $member->id }}">
                                                                        {{ $member->initial_name }} - {{ $member->member_nic }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_category_id">
                                                                    Loan Name</label>
                                                                <select name="loan_category_id" class="form-control"
                                                                    id="loan_category_id" required>
                                                                    <option selected disabled value="">--- Select loan
                                                                        ---</option>
                                                                    <option value="1">Speed Loan</option>
                                                                    <option value="2">Business Loan</option>
                                                                    <option value="3">Micro Loan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-6">
                                                            <div class="form-group">
                                                                <label for="loan_amount">Loan Amount</label>

                                                                <select class="custom-select loanAmount" id="loan_amount"
                                                                    name="loan_amount" required>
                                                                    <option selected disabled value="">--- Select
                                                                        Amount ---</option>
                                                                    @foreach ($loan_catgories as $loan_category)
                                                                        <option value="{{ $loan_category->categories_id }}">
                                                                            {{ $loan_category->loan_category_amount }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-6">
                                                            <div class="form-group">
                                                                <label for="loan_interst_rate">
                                                                    Loan Rate</label>
                                                                <input type="text" class="form-control" id="loan_rate"
                                                                    name="loan_rate" readonly required>
                                                                {{-- <input type="hidden" class="form-control "  id="loan_rate_in"  name="loan_rate_in"> --}}

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-6">
                                                            <div class="form-group">
                                                                <label for="loan_settle_week">
                                                                    Loan Settle Week</label>

                                                                <input type="text" class="form-control"
                                                                    id="loan_settle_week" name="loan_settle_week" readonly
                                                                    required>
                                                                {{-- <input type="hidden" class="form-control "  id="loan_settle_week_in"  name="loan_settle_week_in"> --}}

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-6">
                                                            <div class="form-group">
                                                                <label for="loan_category_def_docharg">
                                                                    Doc Charger</label>
                                                                <input type="text" class="form-control"
                                                                    id="loan_category_def_docharg" name="loan_documt_charg"
                                                                    readonly required>
                                                                {{-- <input type="hidden" class="form-control "  id="loan_category_def_docharg_in"  name="loan_category_def_docharg_in"> --}}

                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="loan_collected">
                                                                    Loan Collected</label>
                                                                <input type="text" class="form-control"
                                                                    id="loan_collected" name="loan_collected" readonly
                                                                    required>
                                                                {{-- <input type="hidden" class="form-control "  id="loan_collected_in"  name="loan_collected"> --}}

                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="loan_collected">
                                                                    Loan Renal</label>
                                                                <input type="text" class="form-control" id="loan_rental"
                                                                    name="loan_rental" readonly required>
                                                                {{-- <input type="hidden" class="form-control "  id="loan_collected_in"  name="loan_collected"> --}}

                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                               <label for="collect_person">
                                                                Collect Person</label>
                                                               <select name="executive_person" class="form-control" id="executive_person" required>
                                                                  <option selected disabled value="">--- Collect Person ---</option>
                                                                  <option value="1">Thiwanka Senarath</option>
                                                <option value="2">Indika Anura</option>
                                                <option value="3">Tharindu Dilshan</option>
                                                <option value="4">Visuka Gayashan</option>
                                                               </select>
                                                            </div>
                                                         </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_issus_date">Loan Issues Date</label>
                                                                <input type="date" id="loan_issus_date"
                                                                    value="{{ old('loan_issus_date') }}"
                                                                    name="loan_issus_date" class="form-control"
                                                                    placeholder="YYYY-MM-DD" required />
                                                            </div>
                                                        </div>





                                                        <div class="col-12 pb-lg-0 pb-4">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 waves-effect waves-float waves-light">Add
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
