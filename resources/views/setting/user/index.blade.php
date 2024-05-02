@extends('layouts.main')

@section('title')
User Details View | Smart Life Investment
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
                            <div class="mb-12">
                                @include('common.alerts')
                            </div>
                            <div class="card" style="padding: 20px !important;">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">View Loan Collect Details</h4>
                                    <div class="col-3">
                                      @can('User create')
                                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary w-100">New User</a>
                                        @endcan
                                      </div>
                                </div>
                                <div class="card-datatable">
                                    <div class="table-responsive">
                                  <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $counter = 1;
                                        @endphp
                                        @can('User access')
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                              @foreach($user->roles as $role)

                                           
                                              {{ $role->name }},
                                              @endforeach
                                            </td>
                                            <td style="text-align: center;">

                                              @can('User edit')
                                              <a href="{{route('admin.users.edit',$user->id)}}"><button type="button" class="btn btn-sm btn-info waves-effect waves-float waves-light">View</button></a>
                                              @endcan

                                              @can('User delete')
                                              <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                                  @csrf
                                                  @method('delete')
                                                  <input type="text" name="user_Id" value={{$user->id}} hidden>
                                                  <button class="btn btn-sm btn-danger waves-effect waves-float waves-light">Delete</button>
                                              </form>
                                              @endcan
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        @endcan
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Responsive Datatable -->
            </div>
        </div>
@endsection