@extends('layouts.main')

@section('title')
   Loan Details View | Smart Life Investment
@endsection

@section('content')
<div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- Responsive Datatable -->
                <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="padding: 20px !important;">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">View Loan Details</h4>
                                </div>
                                <div class="card-datatable">
                                  <table id="example" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Center Code</th>
                                            <th>Center Name</th>
                                            <th>Center Status</th>
                                            <th>Center Start Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>
                                              <button><i data-feather='trash-2'></i></button>
                                              <button><i data-feather='edit'></i></button>
                                              <button><i data-feather='eye'></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Responsive Datatable -->

            </div>
        </div>
@endsection