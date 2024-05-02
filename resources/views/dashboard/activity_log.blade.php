@extends('layouts.main')

@section('title')
Activity Log | Smart Life Investment
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
                                    <h4 class="card-title">Activity Log</h4>
                                </div>
                                <div class="card-datatable">
                                  <table id="example" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                        $counter = 1;
                                      @endphp
                                      @foreach($activityLogs as $activityLog)
                                      <tr>
                                          <td>{{ $counter++ }}</td>
                                          <td>{{ $activityLog->name }}</td>
                                          <td>{{ $activityLog->email }}</td>
                                          <td>{{ $activityLog->description }}</td>
                                          <td>{{ $activityLog->date_time }}</td>
                                      </tr>
                                      @endforeach
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