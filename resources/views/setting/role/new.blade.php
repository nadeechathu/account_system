@extends('layouts.main')

@section('title')
Role Role Add | Smart Life Investment
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
                      <div class="card-header">
                          <h4 class="card-title">Edit Role Data</h4>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-12">
                                <form class="form form-horizontal" method="POST" action="{{ route('admin.roles.store')}}>
                                  @csrf
                                  @method('post')
                                  <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Role Name</label>
                                    <div class="col-sm-9">
                                        <input  id="role_name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Enter role" class="form-control">
                                    </div>
                                  </div>

                                  <h4 class="card-title">Permissions List</h4>
<div class="row pb-2">
    @foreach($permissions as $permission)
    <div class="col-3">
        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"
        ><span class="badge badge-dark" style="font-size: 14px;padding:4px;margin: 8px;">{{ $permission->name }}</span>
    </div>
    @endforeach
</div>


                                  <button type="submit" class="btn btn-primary" type="submit">Submit</button>
                                </form>
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