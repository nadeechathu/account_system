@extends('layouts.main')

@section('title')
    Loan Collection Page | Smart Life Investment
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
                  <h4 class="card-title">Loan Collection Report</h4>
              </div>
              <div class="card-body">
                  <form class="form" action="{{ route('dashboard.loanCollectionReport')}}" method="get" id="operation-form"
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
                                            <option value="{{ $center->id }}" {{$centerId == $center->id ? 'selected':''}}>
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
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                              <label for="city-column">Collect Person</label>
                              <select class="form-control" id="collect_person" name="collect_person">
                                <option value="">--- select Person ---</option>
                                <option {{$collectPersonId == 1 ? 'selected':''}} value="1">Thiwanka Senarath</option>
                                <option {{$collectPersonId == 2 ? 'selected':''}} value="2">Indika Anura</option>
                                <option {{$collectPersonId == 3 ? 'selected':''}} value="3">Tharindu Dilshan</option>
                                <option {{$collectPersonId == 4 ? 'selected':''}} value="3">Visuka Gayashan</option>
                            </select>
                          </div>
                      </div>
 <div class="col-md-3 col-12">
                          <div class="form-group">
                              <label for="city-column">Collect Status</label>
                              <select class="form-control" id="collect_status" name="collect_status">
                                <option value="">--- select Status ---</option>
                                <option {{$collectStatusId == 1 ? 'selected':''}} value="0">Delect</option>
                                <option {{$collectStatusId == 2 ? 'selected':''}} value="1">Active</option>
                                <option {{$collectStatusId == 3 ? 'selected':''}} value="3">Deactive</option>
                                <option {{$collectStatusId == 4 ? 'selected':''}} value="4">Arrears</option>
                                <option {{$collectStatusId == 5 ? 'selected':''}} value="5">Settlement</option>
                                <option {{$collectStatusId == 6 ? 'selected':''}} value="6">Hold</option>
                                <option {{$collectStatusId == 7 ? 'selected':''}} value="7">Under Payment</option>
                            </select>
                          </div>
                      </div>

                          <div class="col-md-3 col-12">
                              <div class="form-group">
                                  <label for="city-column">Start Date</label>
                                  <input type="date" id="from_date" placeholder="From Date" value="{{$fromDate}}" name="from_date" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-3 col-12">
                              <div class="form-group">
                                  <label for="country-floating">End Date</label>
                                  <input type="date" id="to_date" placeholder="To Date" value="{{$toDate}}" name="to_date" class="form-control">
                              </div>
                          </div>
                          <div class="col-6">
                            <button type="button" onClick="filterBtnClicked()"
                            class="btn btn-primary mr-1 waves-effect waves-float waves-light">Filter</button>


                              <a href="{{route('dashboard.loanCollectionReport')}}"><button type="button" class="btn btn-outline-secondary waves-effect">Reset</button></a>


                          </div>


                          <div class="col-6 text-end">
                            <button class="btn btn-danger mr-1 waves-effect waves-float waves-light" type="button" onClick="downloadCollectCSV();"> <i class="fa fa-download"></i> Download</button>
                            <input type="text" hidden name="download" id="download-flag" value="0">
                         </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>


  <div class="row">
    <div class="col-12 px-3">
        <div class="table-responsive">
       <table id="membersTable" class="table table-hover table-bordered DataTable"
          from="{{ route('dashboard.loanCollectionReport') }}" style="background-color: #fff;">
          <thead class="table-success">
            <tr>
                <th>#</th>

                <th>Member Name</th>
                <th>Member Code</th>
                <th>COLLECT AMOUNT</th>
                <th>Arrears AMOUNT</th>
                <th>COLLECT LOAN BALANCE</th>
                <th>LOAN PAID BALANCE</th>
                <th>STATUS</th>


                <th class="text-center">Action</th>
            </tr>

          </thead>
          <tbody class="table-hover">
            @php
            $counter = 1;
            @endphp
             @foreach ($loanCollections as $loanCollection)
             <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $loanCollection->member->initial_name }}</td>

                <td>{{ $loanCollection->member->member_code }}</td>
                {{-- <td>{{ $loanCollection->member->member_group_no }}</td> --}}
                <td>{{ $loanCollection->collect_amount }}</td>
                <td>{{ $loanCollection->collect_arreas }}</td>
                <td>{{ $loanCollection->collect_loan_balnce }}</td>
                <td>{{ $loanCollection->collect_loan_paid_balnce}}</td>
                <td>


                    @if ($loanCollection->collect_status == 0)
                    <span class="badge bg-danger">Delete</span>
                    @elseif($loanCollection->collect_status == 1)
                    <span class="badge bg-success">Active</span>
                    @elseif($loanCollection->collect_status == 3)
                    <span class="badge bg-primary">De Active</span>
                    @elseif($loanCollection->collect_status == 4)
                    <span class="badge bg-dark">Arrears</span>
                    @elseif($loanCollection->collect_status == 5)
                    <span class="badge bg-info">Loan settlement</span>
                    @elseif($loanCollection->collect_status == 7)
                    <span class="badge badge-primary">Under Payment</span>
                    @else
                    <span class="badge bg-warning">Hold</span>
                    @endif
                 </td>
                <td>
                    <a href="{{ route('loan.view', $loanCollection->id) }}"><button type="button"
                        class="btn btn-sm btn-primary waves-effect btn-action waves-float waves-light"
                        data-toggle="tooltip" data-placement="top" data-original-title="View"><i
                        data-feather='eye'></i></button></a> &nbsp;

                        <a href="{{ route('dashboard.loanCollectionReport.download', ['id' => $loanCollection->id]) }}"><button type="button"
                        class="btn btn-sm btn-danger waves-effect btn-action waves-float waves-light"
                        data-toggle="tooltip" data-placement="top" data-original-title="Download"><i
                        data-feather='download'></i></button></a>
                </td>

            @endforeach
          </tbody>

       </table>
        </div>
       <div class="row mt-2">
          <div class="col-md-12">
             {{$loanCollections->links()}}
          </div>
       </div>
    </div>
 </div>

</section>
  </div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function downloadCollectCSV(){
        let csvDownloader = document.getElementById('download-flag');
        csvDownloader.value = 1;
        document.getElementById('operation-form').submit();
    }

    function filterBtnClicked(){
      let csvDownloader = document.getElementById('download-flag');
        csvDownloader.value = 0;
        document.getElementById('operation-form').submit();
    }
</script>
