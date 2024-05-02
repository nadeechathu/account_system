@extends('layouts.main')

@section('title')
Permission Details View | Smart Life Investment
@endsection

@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <section id="input-sizing">
          <div class="row match-height">
              <div class="col-12">
                  <div class="card">
                    <div class="row">
                      <div class="col-6">
                        <div class="card-header">
                          <h4 class="card-title">Permission Details View</h4>
                      </div>
                      </div>
                        <div class="col-6">
                          <div class="card-header">
                            @can('Permission create')
                            <a href="{{route('admin.permissions.create')}}" class="btn btn-success waves-effect waves-float waves-light">New Permission Create</a>
                            @endcan
                        </div>
                        </div>
                    </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-12">
<div class="row pb-2">
  @can('Permission access')
  @foreach($permissions as $permission)
    <div class="col-4" style="padding: 5px;">
      <span class="badge badge-dark" style="font-size: 14px;padding:4px;margin: 8px;">{{ $permission->name }}</span>
    </div>

        <div class="col-4" style="padding: 5px;">
          @can('Permission edit')
          <a href="{{route('admin.permissions.edit',$permission->id)}}" class="btn btn-warning waves-effect waves-float waves-light">Edit</a>
          @endcan
        </div>
        <div class="col-4" style="padding: 5px;">
          @can('Permission delete')
                          <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger waves-effect waves-float waves-light">Delete</button>
                          </form>
                          @endcan
        </div>                     
    @endforeach
                    @endcan
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

    </div>
</div>
@endsection