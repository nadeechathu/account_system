@extends('layouts.main')
@section('title')
    Add New Member | Smart Life Investment
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
                                        <div class="card-body py-1">
                                            <div class="mb-12">
                                                @include('common.alerts')
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-9">
                                                    <h2>Add Member </h2>
                                                </div>
                                                <div class="col-3">
                                                </div>
                                            </div>
                                            <div class="demo-inline-spacing">
                                                <!-- Basic trigger modal -->
                                                <div class="basic-modal mt-0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 px-3">
                                                <form class="form form-vertical" action="{{ route('member.create') }}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="center_id">Center Name</label>
                                                            <select id="center_id" name="center_id"
                                                                class="select2 form-control" required>
                                                                <option selected disabled value=""> ----- Select ---- </option>
                                                                @foreach ($centers as $center)
                                                                    <option value="{{ $center->id }}">
                                                                        {{ $center->center_name }} -
                                                                        {{ $center->branch->branch_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_category_id">
                                                                    Loan Category Name</label>
                                                                <select name="loan_category_id" class="form-control"
                                                                    id="loan_category_id" required>
                                                                    <option>--- Select loan ---</option>
                                                                    <option value="1">Speed Loan</option>
                                                                    <option value="2">Business Loan</option>
                                                                    <option value="3">Micro Loan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="member_id" id="member_id"
                                                            value="{{ $passMemberId }}" hidden>
                                                        <div class="col-12 hidden">
                                                            <div class="form-group">
                                                                <label for="member_code">
                                                                    Member Code</label>


                                                                <input type="text" class="form-control" id="member_code"
                                                                    name="member_code"
                                                                    value="{{ old('member_code', $passMemberId) }}"
                                                                    placeholder="Member Code" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="member_name">
                                                                    Member Name</label>
                                                                <input type="text" class="form-control" id="member_name"
                                                                    name="member_name" value="{{ old('member_name') }}"
                                                                    placeholder="Member Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="initial_name">
                                                                    Initial Name</label>
                                                                <input type="text" class="form-control" id="initial_name"
                                                                    name="initial_name" value="{{ old('initial_name') }}"
                                                                    placeholder="Initial Name" required>
                                                            </div>
                                                        </div>


                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <label for="member_address">Member Address</label>
                                                                <input type="text" class="form-control"
                                                                    id="member_address" name="member_address"
                                                                    value="{{ old('member_address') }}"
                                                                    placeholder="Member Address" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="member_phone_no">
                                                                    Member Phone Number</label>
                                                                <input type="text" class="form-control"
                                                                    id="memberPhoneNo" name="member_phone_no"

                                                                    value="{{ old('member_phone_no') }}"
                                                                    placeholder="Member Phone Number" maxlength="10"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <label for="member_nic">Member NIC</label>
                                                                <input type="text" class="form-control" id="member_nic"
                                                                    name="member_nic" value="{{ old('member_nic') }}"
                                                                    placeholder="Member NIC" required>
                                                                    <span id="emailError" style="color: red;font-weight: 600;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="member_group_no">
                                                                    Member Group Number</label>
                                                                <input type="text" name="member_group_no"
                                                                    class="form-control @error('member_group_no') is-invalid @enderror"
                                                                    value="{{ old('member_group_no') }}"
                                                                    placeholder="Member Group Number"
                                                                    id="member_group_no" />
                                                                @error('member_group_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-row d-none" id="otherLoanShow">
                                                            <div class="card1">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="guarantor_member_1">Guarantor
                                                                                Member 01</label>
                                                                            <select id="guarantor_md"
                                                                                name="guarantor_member_1"
                                                                                class="select2 form-control">
                                                                                <option selected disabled value="">
                                                                                    ----- Select ----
                                                                                </option>
                                                                                @foreach ($members as $key => $member)
                                                                                    <option value="{{ $member->id }}">
                                                                                        {{ $member->member_name }} -
                                                                                        {{ $member->member_code }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="guarantor_member_2">Guarantor
                                                                                Member 02</label>
                                                                            <select id="gua2"
                                                                                name="guarantor_member_2"
                                                                                class="select2 form-control">
                                                                                <option selected disabled value="">
                                                                                    ----- Select ----
                                                                                </option>
                                                                                @foreach ($members as $key => $member)
                                                                                    <option value="{{ $member->id }}">
                                                                                        {{ $member->member_name }} -
                                                                                        {{ $member->member_code }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="member_relationship">Member
                                                                        Relationship</label>
                                                                    <select name="member_relationship"
                                                                        class="form-control" id="member_relationship"
                                                                        required>
                                                                        <option>--- Select Relationship ---</option>
                                                                        <option value="1">Son</option>
                                                                        <option value="2">Husband</option>
                                                                        <option value="3">Wife</option>
                                                                        <option value="4">other</option>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="member_relationship_pserson_name">Personal
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="member_relationship_pserson_name"
                                                                        name="member_relationship_pserson_name"
                                                                        value="{{ old('member_relationship_pserson_name') }}"
                                                                        placeholder="Personal Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="member_relationship_pserson_nic">Personal
                                                                        NIC </label>
                                                                    <input type="text" class="form-control"
                                                                        id="member_relationship_pserson_nic"
                                                                        name="member_relationship_pserson_nic"
                                                                        value="{{ old('member_relationship_pserson_nic') }}"
                                                                        placeholder="Personal NIC">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="member_relationship_pserson_phone">Personal
                                                                        Phone</label>
                                                                    <input type="text" class="form-control"
                                                                        id="member_relationship_pserson_phone"
                                                                        name="member_relationship_pserson_phone"
                                                                        value="{{ old('member_relationship_pserson_phone') }}"
                                                                        placeholder="Personal Personal" maxlength="10"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-row d-none" id="speedLoanShow">
                                                            <div class="card1">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <h2>Guarantor 01</h2>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <h2>Guarantor 02</h2>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="guarantor_01_name">Guarantor
                                                                                    Name 1</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_01_name"
                                                                                    name="guarantor_01_name"
                                                                                    value="{{ old('guarantor_01_name') }}"
                                                                                    placeholder="Guarantor Name 1">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_01_nic">Guarantor NIC
                                                                                    1</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_01_nic"
                                                                                    name="guarantor_01_nic"
                                                                                    value="{{ old('guarantor_01_nic') }}"
                                                                                    placeholder="Guarantor NIC 1">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_01_phone">Guarantor
                                                                                    Phone 1</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_01_phone"
                                                                                    name="guarantor_01_phone"
                                                                                    value="{{ old('guarantor_01_phone') }}"
                                                                                    placeholder="Guarantor Phone 1" maxlength="10"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_01_address">Guarantor
                                                                                    Address 1</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_01_address"
                                                                                    name="guarantor_01_address"
                                                                                    value="{{ old('guarantor_01_address') }}"
                                                                                    placeholder="Guarantor Address 1">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="guarantor_01_birthday">Guarantor
                                                                                    Birthday 1</label>

                                                                                <input type="date" class="form-control"  onchange="calculateAge()"
                                                                                    id="guarantor_01_birthday"
                                                                                    name="guarantor_01_birthday"
                                                                                    value="{{ old('guarantor_01_birthday') }}"
                                                                                    placeholder="Guarantor Birthday 1">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_01_age">Guarantor Age
                                                                                    1</label>
                                                                                <input type="number" readonly class="form-control"
                                                                                    id="guarantor_01_age"
                                                                                    name="guarantor_01_age"
                                                                                    value="{{ old('guarantor_01_age') }}"
                                                                                    placeholder="Guarantor Age 1">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_01_job">Guarantor Job
                                                                                    1</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_01_job"
                                                                                    name="guarantor_01_job"
                                                                                    value="{{ old('guarantor_01_job') }}"
                                                                                    placeholder="Guarantor Job 1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="guarantor_02_name">Guarantor
                                                                                    Name 2</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_02_name"
                                                                                    name="guarantor_02_name"
                                                                                    value="{{ old('guarantor_02_name') }}"
                                                                                    placeholder="Guarantor Name 2">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_02_nic">Guarantor NIC
                                                                                    2</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_02_nic"
                                                                                    name="guarantor_02_nic"
                                                                                    value="{{ old('guarantor_02_nic') }}"
                                                                                    placeholder="Guarantor NIC 2">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_02_phone">Guarantor
                                                                                    Phone 2</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_02_phone"
                                                                                    name="guarantor_02_phone"
                                                                                    value="{{ old('guarantor_02_phone') }}"
                                                                                    placeholder="Guarantor Phone 2" maxlength="10"
                                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_02_address">Guarantor
                                                                                    Address 2</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_02_address"
                                                                                    name="guarantor_02_address"
                                                                                    value="{{ old('guarantor_02_address') }}"
                                                                                    placeholder="Guarantor Address 2">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="guarantor_02_birthday">Guarantor
                                                                                    Birthday 2</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="guarantor_02_birthday" onchange="calculateAgeGarantor02()"
                                                                                    name="guarantor_02_birthday"
                                                                                    value="{{ old('guarantor_02_birthday') }}"
                                                                                    placeholder="Guarantor Birthday 2">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_02_age">Guarantor Age
                                                                                    2</label>
                                                                                <input type="number" readonly class="form-control"
                                                                                    id="guarantor_02_age"
                                                                                    name="guarantor_02_age"
                                                                                    value="{{ old('guarantor_02_age') }}"
                                                                                    placeholder="Guarantor Age 2">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="guarantor_02_job">Guarantor Job
                                                                                    2</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="guarantor_02_job"
                                                                                    name="guarantor_02_job"
                                                                                    value="{{ old('guarantor_02_job') }}"
                                                                                    placeholder="Guarantor Job 2">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="member_register_date">Member Register
                                                                    Date</label>
                                                                <input type="date" id="member_register_date"
                                                                    class="form-control"
                                                                    value="{{ old('member_register_date') }}"
                                                                    name="member_register_date"
                                                                    placeholder="YYYY-MM-DD" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 waves-effect waves-float waves-light" name="register" id="register">Add
                                                                Member</button>
                                                            <button type="reset"
                                                                class="btn btn-outline-secondary waves-effect">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#loan_category_id").change(function() {
            var loan_category_id = $('#loan_category_id').val();
            if (loan_category_id == 2) {
                $('#speedLoanShow').addClass('d-block');
                $('#otherLoanShow').removeClass('d-block');
            } else if (loan_category_id == 1) {

                $('#speedLoanShow').addClass('d-block');
                $('#otherLoanShow').removeClass('d-block');
            } else if (loan_category_id == 3) {

                $('#otherLoanShow').addClass('d-block');
                $('#speedLoanShow').removeClass('d-block');

            } else {
                $('#otherLoanShow').removeClass('d-block');
                $('#speedLoanShow').removeClass('d-block');
            }
        })
    });
</script>

<script>
    $(document).ready(function() {
        $('#member_nic').on('keyup', function() {
            var member_nic = $(this).val();
            $.ajax({
                url: "{{ route('member.check') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "member_nic": member_nic
                },
                success: function(response) {
                    if (response.status == 'error') {
                        $('#emailError').text(response.message);
                    } else {
                        $('#emailError').text('');
                    }
                }
            });
        });
    });
</script>

{{-- <script>
    function FindAge(){
        var day = document.getElementById("guarantor_01_birthday").value;
        var DOB = new Date(day);
        var today = new Date();
        var age = today.getTime() - DOB.getTime();
        Age = Math.floor(Age/(1000*60*60*24*365.25));
        document.getElementById("guarantor_01_age").value = Age;
    }
</script> --}}

<script>
    function calculateAge() {
    const birthdateInput = document.getElementById('guarantor_01_birthday');
    const birthdate = new Date(birthdateInput.value);
    const currentDate = new Date();

    // Calculate age
    let age = currentDate.getFullYear() - birthdate.getFullYear();
    const currentMonth = currentDate.getMonth();
    const birthdateMonth = birthdate.getMonth();
    const currentDay = currentDate.getDate();
    const birthdateDay = birthdate.getDate();

    if (currentMonth < birthdateMonth || (currentMonth === birthdateMonth && currentDay < birthdateDay)) {
      age--;
    }
    const ageInput = document.getElementById('guarantor_01_age');
  ageInput.value = age;
  }
</script>


<script>
    function calculateAgeGarantor02() {
    const birthdateInput = document.getElementById('guarantor_02_birthday');
    const birthdate = new Date(birthdateInput.value);
    const currentDate = new Date();

    // Calculate age
    let age = currentDate.getFullYear() - birthdate.getFullYear();
    const currentMonth = currentDate.getMonth();
    const birthdateMonth = birthdate.getMonth();
    const currentDay = currentDate.getDate();
    const birthdateDay = birthdate.getDate();

    if (currentMonth < birthdateMonth || (currentMonth === birthdateMonth && currentDay < birthdateDay)) {
      age--;
    }
    const ageInput = document.getElementById('guarantor_02_age');
  ageInput.value = age;
  }
</script>
