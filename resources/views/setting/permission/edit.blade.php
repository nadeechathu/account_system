@extends('layouts.main')

@section('title')
Edit Permission Data | Smart Life Investment
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
                          <h4 class="card-title">Edit Permission Data</h4>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-12">
                                <form class="form form-horizontal" method="POST" action="{{ route('admin.permissions.update',$permission->id)}}">
                                  @csrf
                                  @method('post')
                                  <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Permission Name</label>
                                    <div class="col-sm-9">
                                        <input  id="role_name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name',$permission->name) }}"
                                        placeholder="Enter permission" class="form-control">
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-info" type="submit">Update</button>
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