@extends('layouts.main')

@section('title')
    Member Details View | Smart Life Investment
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

                                        <div class="card-body py-1 px-lg-2 px-0">
                                            <div class="mb-12">
                                                @include('common.alerts')
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-12 py-2 text-center px-5">
                                                    <a  href="{{ route('dashboard.index') }}" class="text-center border-2 btn btn-info waves-effect waves-float waves-info w-100">Back</a>
                                                </div>
                                            <div class="row justify-content-end">
                                                <div class="col-12">
                                                    <h4 class="card-title mb-0">View Member Details</h4>
                                                 </div>
                                                 @canany('Member create')
                                                <div class="col-3  d-none">
                                                  <a href="{{ route('member.createUI') }}" class="btn btn-primary w-100">Add Member</a>
                                                </div>
                                                @endcanany
                                            </div>
                                            <div class="demo-inline-spacing">
                                                <!-- Basic trigger modal -->
                                                <div class="basic-modal mt-0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 px-lg-3">
                                                <div class="table-responsive">
                                                <table id="membersTable" class="table table-hover table-bordered DataTable" from="{{ route('members.Mobiledata') }}">
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>NIC</th>
                                                            <th class="text-center">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-hover">
                                                    </tbody>
                                                </table>
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



<!-- Basic trigger modal end -->


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        var url = $('#membersTable').attr('from');
    var table = $('#membersTable').DataTable({
        ordering: true,
        processing: true,
        serverSide: true,
        pageLength: 8,
        ajax: url,
        columns: [

            {
                data: 'member_code',
                name: 'member_code',
                searchable: true,
                orderable: true
            },

            {
                data: 'member_nic',
                name: 'member_nic',
                searchable: true,
                orderable: true
            },
            {
                data: 'actions',
                name: 'actions',
                searchable: false,
                orderable: false
            },
        ],
    });
    });


    function openDeleteConfirmation(id) {

let deleteConfirmationBtn = document.getElementById('delete-member-btn');

var url = "{{ route('member.remove', ':id') }}";
url = url.replace(':id', id);

deleteConfirmationBtn.href = url;

$('#delectMember').modal('toggle');
}
</script>

