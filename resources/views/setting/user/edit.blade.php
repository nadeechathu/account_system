@extends('layouts.main')
@section('title')
User Details Edit | Smart Life Investment
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
                     <h4 class="card-title">User Details Edit</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="mb-12">
                            @include('common.alerts')
                        </div>
                        <div class="col-12">
                           <form class="form form-horizontal" method="POST" action="{{ route('admin.users.update',$user->id)}}">
                              @csrf
                              @method('put')

                              <input   
                                       type="text"
                                       name="user_id"
                                       value="{{ $user->id}}"
                                        class="form-control" hidden>
                              <div class="form-group row">
                                 <label for="colFormLabel" class="col-sm-3 col-form-label">
                                 Branch</label>
                               
                                 <div class="col-sm-9">
                                    <select class="form-select " name="branch_id" aria-label="Default select example">
                                       <option selected value="0">Select Branch</option>
                                      
                                       @foreach($branches as $branch)



                                       <option  {{$user->branch_id == $branch->id ? 'selected':''}} value="{{ $branch->id }}"> {{   $branch->branch_name }}</option>



                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="colFormLabel" class="col-sm-3 col-form-label">
                                 Username</label>
                                 <div class="col-sm-9">
                                    <input  id="name"
                                       type="text"
                                       name="name"
                                       value="{{ old('name',$user->name) }}"
                                       placeholder="Enter Username" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                                 <div class="col-sm-9">
                                    <input  id="email"
                                       type="text"
                                       name="email"
                                       value="{{ old('email',$user->email) }}"
                                       placeholder="Enter email" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="colFormLabel" class="col-sm-3 col-form-label">Password</label>
                                 <div class="col-sm-9">
                                    <input  id="password"
                                       type="text"
                                       name="password"
                                       value="{{ old('password') }}"
                                       placeholder="Enter password" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="colFormLabel" class="col-sm-3 col-form-label">Confirm Password</label>
                                 <div class="col-sm-9">
                                    <input  id="password_confirmation"
                                       type="text"
                                       name="password_confirmation" 
                                       placeholder="Re-enter password" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="colFormLabel" class="col-sm-3 col-form-label">Role</label>
                                 <div class="col-sm-9">
                                    <div class="grid grid-cols-3 gap-4">
                                       @foreach($roles as $role)
                                       <div class="flex flex-col justify-cente">
                                          <div class="flex flex-col">
                                             <label class="inline-flex items-center mt-3">
                                             <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]" value="{{$role->id}}"
                                             @if(count($user->roles->where('id',$role->id)))
                                             checked 
                                             @endif
                                             ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                                             </label>
                                          </div>
                                       </div>
                                       @endforeach
                                    </div>
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