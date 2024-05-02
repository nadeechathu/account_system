<button type="button " class="btn btn-primary w-100" data-toggle="modal" data-target="#addCenter">
    Add Center
</button>
<!-- Modal -->
<div class="modal fade text-left" id="addCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel111"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Add Center
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body">

                        <form class="form form-vertical" action="{{ route('center.create') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">


                                <div class="form-group">
                                    <label for="branch_id">Branch Name</label>
                                    <select class="form-control" id="branch_id" name="branch_id" required="">
                                        <option>--- select ---</option>
                                        @foreach ($branchs as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="center_code">Center Code</label>
                                        <input type="text" id="center_code" class="form-control" name="center_code" value="{{old('center_code')}}"
                                            placeholder="Center Code" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="center_name">Center Name</label>
                                        <input type="text" id="center_name" class="form-control" name="center_name" value="{{old('center_name')}}"
                                            placeholder="Center Name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="center_allocate_date">Center Allocate Date</label>
                                        <select name="center_allocate_date" class="form-control" id="center_allocate_date" required>
                                            <option >--- Select Center Allocate Date ---</option>
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="3">Wednesday</option>
                                            <option value="4">Thursday</option>
                                            <option value="5">Friday</option>
                                            <option value="6">Saturday</option>
                                            <option value="7">Sunday</option>
                                          </select>
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="executive_person">Executive Person</label>
                                            <select name="executive_person" class="form-control" id="executive_person" required>
                                                <option >--- Select Executive Person ---</option>
                                                <option value="1">Thiwanka Senarath</option>
                                                <option value="2">Indika Anura</option>
                                                <option value="3">Tharindu Dilshan</option>
                                                <option value="4">Visuka Gayashan</option>
                                              </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>



//     $("#branch_id").on('change', function() {

//      var get_branch_id = this.value;


// $.ajax({
//     type: 'GET',
//     url: "{{ url('get-center-code') }}/" + get_branch_id,
//     success: function(response) {
//         console.log(response);
//         $('#center_code').val('');
//    alert(response.brach_code);
//         $('#center_code').val(response.brach_code);


//     },
//     error: function(xhr, status, error) {
//         console.log('Error:', error);
//     }
// });
// });



</script>
