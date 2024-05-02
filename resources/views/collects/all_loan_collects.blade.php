@extends('layouts.main')
@section('title')
View Loan Collect Details | Smart Life Investment
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
                                 <div class="col-lg-9">
                                    <h4 class="card-title">View Loan Collect Details</h4>
                                 </div>
                                 @canany('Member create')
                                 <div class="col-lg-3">
                                    <a href="{{ route('collects.loanCollectCreate') }}" class="btn btn-primary w-100">Add Loan Collect</a>
                                 </div>
                                 @endcanany
                              </div>
                              <div class="demo-inline-spacing">
                                 <!-- Basic trigger modal -->
                                 <div class="col-md-6" style="float:right;">
                                    <form action="{{route('dashboard.loanCollects')}}" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control" name="searchKey" placeholder="Member name or code "
                                            value="{{$searchKey}}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default border-dark">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2  mt-0">
                                    <a href="{{route('dashboard.loanCollects')}}" class="btn btn-sm btn-info waves-effect waves-float waves-light py-1 w-100"> Clear</a>
                                </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12 px-3">
                                 <div class="table-responsive">
                                    @if (sizeof($collects) > 0)
                                    <table  class="table table-hover table-bordered DataTable"  >
                                       <thead class="table-success">
                                          <tr>
                                              <th>#</th>
                                             <th>Branch Or Center</th>
                                             <th>Member Name / Memeber Code</th>
                                             <th>Collect Amount</th>
                                             <th>Arrears</th>
                                             <th>Collect Date</th>
                                             <th>Collect Person</th>
                                             <th>Status</th>
                                             <th class="text-center">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody class="table-hover">
                                        @php
                                        $counter = 1;
                                      @endphp

                                          @foreach($collects as $index => $collect)
                                          <tr>
                                             <td>{{ $counter++ }}</td>
                                             <td>{{ $collect->branch_name }} - {{ $collect->center_name }}</td>
                                             <td>{{ $collect->initial_name }} - {{ $collect->member_code }}</td>
                                             <td>Rs.{{ $collect->collect_amount }}</td>
                                             <td>Rs.{{ $collect->collect_arreas }}</td>
                                             <td>{{ $collect->collect_date }}</td>
                                             <td>

                                               
                                                @foreach($users as $user)
                                                @if($collect->collect_person == $user->id)
                                                    <p>{{ $user->name }}</p>
                                                @endif
                                            @endforeach
                                              
                                                {{-- {{ $collect->collect_person }} --}}
                                                   {{-- @if ($collect->collect_person == 1)
                                                Thiwanka Senarath
                                                @elseif ($collect->collect_person == 2)
                                                Indika Anura
                                                 @elseif ($collect->collect_person == 3)
                                                 Tharindu Dilshan
                                                @else
                                                Visuka Gayashan
                                                @endif --}}
                                             </td>
                                            <td>
                                                @if ($collect->collect_status == 0)
                                                <div class="badge badge-danger">Delete</div>
                                                @elseif ($collect->collect_status == 1)
                                                <div class="badge badge-success">Active</div>
                                                @elseif ($collect->collect_status == 2)
                                                <div class="badge badge-warning">Pending</div>
                                                @elseif ($collect->collect_status == 3)
                                                <div class="badge badge-danger">Reject</div>
                                                @elseif ($collect->collect_status == 4)
                                                <div class="badge badge-warning">Arrears</div>
                                                @elseif ($collect->collect_status == 5)
                                                <div class="badge badge-secondary">Settlement</div>
                                                @elseif ($collect->collect_status == 7)
                                                <div class="badge badge-primary">Under Payment</div>
                                                @else
                                                <div class="badge badge-info">Hold</div>
                                                @endif
                                            </td>
                                           <td>
                                                @canany('Collections access')
                                                <a href="{{ route('collects.view', $collect->collect_id) }}"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i data-feather='eye'></i></button></a>
                                                @endcanany

                                                <a href="{{ route('collects.viewUI', $collect->collect_id) }}"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i data-feather='edit-2'></i></button></a>

                                                @canany('Collections delete')
                                                <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation('{{ $collect->collect_id }}')" data-target="#delectLoan" data-toggle="modal"><i data-feather='trash-2'></i></button>

                                                @endcanany
                                              </td>

                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                    @else
                                    <div class="col-12 text-center">
                                        <h2 class="font-36 text-danger fw-bold pb-3">No records found.</h2>
                                    </div>
                                @endif
                                 </div>
                              </div>

                              <div class="card-footer">
                                 <div class="d-felx justify-content-center">
                                    {{$collects->links()}}
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
<!-- Modal -->
 <!-- Modal -->
 <div class="modal fade text-left" id="delectCollectData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-20" id="exampleModalLabel">Confirm Delect</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-15">Are you sure you want to delete this collect from the system ?</p>
                <p class="text-danger font-15">This operation cannot be undone.</p>

            </div>
            <div class="modal-footer">


                <a href="" id="delete-collection-btn"><button type="button" class="btn btn-success  btn-secondary px-3 font-13 rounded-2">Yes</button></a>
                <button type="button" class="btn  btn-secondary px-3 font-13 rounded-2" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Basic trigger modal end -->
<!-- Basic trigger modal end -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    function openDeleteConfirmation(id) {

let deleteConfirmationBtn = document.getElementById('delete-collection-btn');
var url = "{{ route('collects.remove', ':id') }}";
url = url.replace(':id', id);

deleteConfirmationBtn.href = url;
$('#delectCollectData').modal('toggle');

}
</script>
