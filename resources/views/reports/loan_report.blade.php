@extends('layouts.main')

@section('title')
    Loan Report Page | Smart Life Investment
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
                  <h4 class="card-title">Loan Details Report</h4>
              </div>
              <div class="card-body">
                <form class="form" action="{{ route('dashboard.loanReport') }}" method="get"
                enctype="multipart/form-data" id="operation-form">
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
                            <select class="select2 form-control" data-select2-id="1" tabindex="-1"
                               aria-hidden="true" id="center_id" name="center_id">
                               <option value="">--- select ---</option>
                               @foreach ($centers as $center)
                               <option value="{{ $center->id }}" {{$centerId == $center->id ? 'selected':''}}>
                                  {{ $center->center_name }} - {{ $center->branch->branch_name }}
                               </option>
                               @endforeach
                            </select>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="loanStatus">Loan Status</label>
                        <select class="form-control" id="loanStatus" name="loanStatus">
                          <option value="">--- select Status ---</option>
                          <option {{$loanStatusId == 1 ? 'selected':''}} value="1">Activate</option>
                          <option {{$loanStatusId == 2 ? 'selected':''}} value="2">Pending</option>
                          <option {{$loanStatusId == 3 ? 'selected':''}} value="3">Reject</option>
                          <option {{$loanStatusId == 5 ? 'selected':''}} value="5">Settlement</option>
                         </select>
                    </div>
                </div>
                   <div class="col-md-6 col-12">
                      <div class="form-group">
                         <label for="city-column">Start Date</label>
                         <input type="date" id="from_date" placeholder="From Date" value="{{$fromDate}}" name="from_date" class="form-control">
                      </div>
                   </div>
                   <div class="col-md-6 col-12">
                      <div class="form-group">
                         <label for="country-floating">End Date</label>
                         <input type="date" id="to_date" placeholder="To Date" value="{{$toDate}}" name="to_date" class="form-control">
                      </div>
                   </div>
                   <div class="col-6">
                      <button type="submit"
                         class="btn btn-primary mr-1 waves-effect waves-float waves-light">Filter</button>
                      <a href="{{route('dashboard.loanReport')}}"><button type="button" class="btn btn-outline-secondary waves-effect">Reset</button></a>
                   </div>
                   <div class="col-3 float-right">
                       <button class="btn btn-danger mr-1 waves-effect waves-float waves-light" type="button" onClick="downloadMemberCSV();"> <i class="fa fa-download"></i> Download</button>
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
          from="{{ route('members.data') }}" style="background-color: #fff;">
          <thead class="table-success">
             <tr>
                <th>#</th>
                <th>Member Name / Code</th>
                <th>Amount</th>
                <th>Rental</th>
                <th>Issues Date</th>
                <th>Status</th>
                <th class="text-center">
                   Action
                </th>
             </tr>
          </thead>
          <tbody class="table-hover">
             @php
             $counter = 1;
             @endphp
             @foreach ($loans as $loan)
             <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $loan->member->initial_name }} - {{ $loan->member->member_code }}</td>
                <td>{{ $loan->loanAmount->loan_category_amount }}</td>
                <td>{{ $loan->loan_rental }}</td>

                <td>{{ $loan->loan_issus_date }}</td>

                <td>

                   @if ($loan->loan_status == 1)
                   <span class="badge bg-success">Active</span>
                   @elseif($loan->loan_status == 2)
                   <span class="badge badge-warning">Pending</span>
                   @elseif($loan->loan_status == 3)
                   <span class="badge bg-danger">Reject</span>
                   @else
                   <span class="badge badge-secondary">Settlement</span>
                   @endif
                </td>
                <td>
                   <a href="{{ route('loan.view', $loan->id) }}"><button type="button"
                      class="btn btn-sm btn-primary waves-effect btn-action waves-float waves-light"
                      data-toggle="tooltip" data-placement="top" data-original-title="View"><i
                      data-feather='eye'></i></button></a> &nbsp;

                      <a href="{{ route('dashboard.loanReport.download', ['id' => $loan->id]) }}"><button type="button"
                      class="btn btn-sm btn-danger waves-effect btn-action waves-float waves-light"
                      data-toggle="tooltip" data-placement="top" data-original-title="Download"><i
                      data-feather='download'></i></button></a>
                </td>
             </tr>
             @endforeach
          </tbody>
       </table>
       </div>
       <div class="row mt-2">
          <div class="col-md-12">
             {{$loans->links()}}
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
function downloadMemberCSV(){
   let csvDownloader = document.getElementById('download-flag');
   csvDownloader.value = 1;
   document.getElementById('operation-form').submit();
}


</script>
