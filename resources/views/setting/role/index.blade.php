@extends('layouts.main')

@section('title')
Role Details View | Smart Life Investment
@endsection

@section('content')
<div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- Responsive Datatable -->
                <section id="responsive-datatable">
                    <div class="row">
                            <div class="card" style="padding: 20px !important;">
                              <div class="col-12">
                                <div class="container">
                                  <div class="row">
                                     <div class="col-6">
                                      <div class="card-header border-bottom">
                                      <h4 class="card-title">Role Details View</h4>
                                     </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="text-right">
                                      @can('Role create')
                                        <a href="{{route('admin.roles.create')}}" class="btn btn-primary waves-effect waves-float waves-light">New Role</a>
                                      </div>
                                    @endcan</div>
                                  </div>
                                </div>
                                
                                <div class="card-datatable">
                                  <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Role Name</th>
                                            <th>Permissions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @can('Role access')
                                      @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                              @foreach($role->permissions as $permission)
                                                <span class="badge badge-dark" style="font-size: 14px;padding: 7px;margin: 5px;">{{ $permission->name }}</span>
                                              @endforeach
                                            </td>
                                            <td>
                                              @can('Role edit')
                                              <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-warning waves-effect waves-float waves-light">Edit</a>
                                              @endcan
                                              @can('Role delete')
                                              <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="btn btn-danger waves-effect waves-float waves-light">Delete</button>
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
                </section>
            </div>
        </div>
@endsection