@extends('layouts.main')

@section('title')
    Bulk Report Page | Smart Life Investment
@endsection

@section('content')
<div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
<section id="multiple-column-form">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Bulk Report</h4>
              </div>
                <div class="col-12">
                    <div class="mb-12">
                        @include('common.alerts')
                    </div>
                </div>
              <div class="card-body">



                  <form class="form" action="{{ route('dashboard.bulkReport')}}" method="get"
                  enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-md-4 col-12">
                              <div class="form-group">
                                  <label for="first-name-column">Branches</label>
                                  <div class="position-relative" data-select2-id="51">
                                    <select class="form-control" id="branch_id" name="branch_id">
                                        <option value="">--- select ---</option>
                                        @foreach($branches as $branch)
                                        <option {{$branchId == $branch->id ? 'selected':''}} value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                        @endforeach

                                     </select>
                                </div>
                              </div>
                          </div>

                          <div class="col-md-4 col-12">
                              <div class="form-group">
                                  <label for="last-name-column">Centers</label>
                                  <div class="position-relative" data-select2-id="51">
                                       <select class="select2 form-control" data-select2-id="1" tabindex="-1" aria-hidden="true" id="center_id" name="center_id">
                                        <option value="">--- select ---</option>
                                        @foreach ($centers as $center)
                                            <option value="{{ $center->id }}" {{$center->id == $centerId ? 'selected':''}}>
                                                {{ $center->center_name }} - {{  $center->branch->branch_name }}</option>
                                        @endforeach
                                       </select>
                                   </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="city-column">Collect Date</label>
                                <select class="form-control" id="collectDate" name="collectDate">
                                  <option value="">--- select Date ---</option>
                                  <option {{$collectDateId == 1 ? 'selected':''}} value="1">Monday</option>
                                  <option {{$collectDateId == 2 ? 'selected':''}} value="2">Tuesday</option>
                                  <option {{$collectDateId == 3 ? 'selected':''}} value="3">Wednesday</option>
                                  <option {{$collectDateId == 4 ? 'selected':''}} value="4">Thursday</option>
                                  <option {{$collectDateId == 5 ? 'selected':''}} value="5">Friday</option>
                                  <option {{$collectDateId == 6 ? 'selected':''}} value="6">Saturday</option>
                                  <option {{$collectDateId == 7 ? 'selected':''}} value="7">Sunday</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                          <div class="form-group">
                              <label for="city-column">Collect Person</label>
                              <select class="form-control" id="collect_person" name="collect_person">
                                <option value="">--- select Person ---</option>
                                <option {{$collectPersonId == 1 ? 'selected':''}} value="1">Thiwanka Senarath</option>
                                <option {{$collectPersonId == 2 ? 'selected':''}} value="2">Indika Anura</option>
                                <option {{$collectPersonId == 3 ? 'selected':''}} value="3">Tharindu Dilshan</option>
                                <option {{$collectPersonId == 4 ? 'selected':''}} value="4">Visuka Gayashan</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="city-column">Start Date</label>
                            <input type="date" id="from_date" placeholder="From Date" value="{{$fromDate}}" name="from_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="country-floating">End Date</label>
                            <input type="date" id="to_date" placeholder="To Date" value="{{$toDate}}" name="to_date" class="form-control">
                        </div>
                    </div>
                          {{-- <div class="col-md-4 col-12">
                              <div class="form-group">
                                  <label for="city-column">Start Date</label>
                                  <input type="date" id="start-date" name="start-date" class="form-control" placeholder="YYYY-MM-DD">
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="form-group">
                                  <label for="country-floating">End Date</label>
                                  <input type="date" id="end-date" name="end-date" class="form-control " placeholder="YYYY-MM-DD">
                              </div>
                          </div> --}}
                          <div class="col-6">
                            <button type="submit"
                            class="btn btn-primary mr-1 waves-effect waves-float waves-light">Filter</button>
                            <a href="{{route('dashboard.bulkReport')}}"><button type="button" class="btn btn-outline-secondary waves-effect">Reset</button></a>


                          </div>
                          {{-- <div class="col-6 text-end">
                            <button type="submit"
                            class="btn btn-success mr-1 waves-effect waves-float waves-light">Bulk Form Update </button>

                          </div> --}}
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>


  <div class="row">
    <div class="col-12 px-3">
        <div class="row bg-primary py-1 text-white">
            <div class="col-1 ">#</div>
            <div class="col-2">Member Name</div>
            <div class="col-2">Member Code</div>
            <div class="col-1">Balance</div>
            <div class="col-2">Loan Amount</div>
            <div class="col-2">Collect date     <input type="date" class="form-control" id="abc" /></div>
            <div class="col-2">Action</div>
        </div>
        @php
    $totalLoanAmount = 0;
@endphp

@foreach ($loanCollections as $loan)
    @php
        $totalLoanAmount += $loan->loan_rental;
    @endphp
@endforeach
        <form action="{{route('dashboard.bulkReport.update')}}" method="post" id="bulkForm">
            @csrf
            <div class="row text-dark border-bottom border-primary pt-1">
                @php
                $counter = 1;
                @endphp

                 @foreach ($loanCollections as $loanCollection)

                <div class="col-1 pt-1">{{ $counter++ }}</div>
                <div class="col-2 pt-1">{{ $loanCollection->member->initial_name }}</div>
                <div class="col-2 pt-1">{{ $loanCollection->member->member_code }}</div>
                <div class="col-1 pt-1">
                  {{-- @php
                  if($loanCollection->member_id == 3) {

                      dd($loanCollection->collections->first());
                  }
                  @endphp --}}
                   @if (optional($loanCollection->collections)->first() != null)
                    {{ $loanCollection->collections->first()->collect_loan_balnce }}
                   @else

                    {{ $loanCollection->loan_collected }}
                   @endif


                </div>
                <div class="col-2"> <input type="text" class="form-control py-1 mb-1" id="" onkeydown="return disableEnterKey(event)" name="loanAmounts[]"
                    value="{{ $loanCollection->loan_rental}}">

                        <input type="text" hidden name="loanIds[]" value="{{$loanCollection->id}}">
                        <input type="text" hidden name="memberIds[]" value="{{$loanCollection->member->id}}">

                        <input type="text" hidden name="loanamountarres[]" value="{{ $loanCollection->loan_rental}}">
                    {{-- <input type="text" class="form-control py-1 mb-1" id="" name="collect_ids[]"
                    value="{{ $loanCollection->id}}"> --}}
                </div>
                <div class="col-2"><input type="date" class="form-control py-1 mb-1 sum-input" name="collectDates[]" id="collect_date" value="{{ now()->format('Y-m-d') }}"></div>

                <div class="col-2">
                   <select name="collect_status[]" id="collect_status" class="form-control">
                    <option value="1">Active</option>
                    <option value="4">Arrears</option>
                    <option value="7">Under Payment</option>
                    @canany('Loan Collect Hold')
                    <option value="6">Hold</option>
                    @endcanany
                   </select>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-end pt-3">
                <div class="col-3 text-end">
                    <button type="submit"
                    class="btn btn-success mr-1 waves-effect waves-float waves-light hidden" id="hidden-bulk-form">Bulk Form Update </button>

                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-outline-primary" data-toggle="modal" onclick="filterAndDisplay()" data-target="#default">
                  Bulk Form Update
              </button>

              <!-- Modal -->
              <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel1">Bulk Amount</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <h5>Bulk Amount : Rs:  <span id="filteredLoanSum"></span></h5>

                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" onclick="bulkSubmitBtn()" data-dismiss="modal" id="submitButton">Accept</button>
                          </div>
                      </div>
                  </div>
              </div>
                </div>
               </div>
        </form>
    </div>
 </div>
</section>
  </div>
</div>
</div>

<script>
    $("#abc").change(function() {
        var date = $(this).val();
        $("input[name='collectDates[]']").each((i) => {

            $($("input[name='collectDates[]']")[i]).val(date);
        });
    });
</script>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<script>

document.addEventListener("DOMContentLoaded", function() {
  // Find the submit button by its ID
  var submitButton = document.getElementById("submitButton");

  // Add a click event listener to the submit button
  submitButton.addEventListener("click", function() {
      // Find the form element by its ID
      var form = document.getElementById("bulkForm");

      // Submit the form
      form.submit();
  });
});
</script>


<script>
  function filterAndDisplay() {
        var form = document.getElementById('bulkForm');
        var formData = new FormData(form);

        var loanAmounts = [];
        for (var pair of formData.entries()) {
            if (pair[0] === 'loanAmounts[]') {
                loanAmounts.push(parseFloat(pair[1]) || 0);
            }
        }

        var totalLoanSum = loanAmounts.reduce(function(a, b) {
            return a + b;
        }, 0);

        document.getElementById('filteredLoanSum').textContent = totalLoanSum.toFixed(2);
    }
</script>
<script>
    // Disable Enter key from submitting the form
    function disableEnterKey(event) {
        if (event.keyCode === 13) { // 13 is the Enter key's keyCode
            event.preventDefault();
            return false;
        }
    }
</script>
