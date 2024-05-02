<?php

namespace App\Http\Controllers\Admin;
use App\Models\Member;
use App\Models\Branch;
use App\Models\Center;
use App\Models\Guarantor;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    public function member()
    {
        $branchs = Branch::where('branch_status', 1)->get();
        return view('members.all_members', compact('branchs'));
    }

  
    public function memberStoreUI()
    {
        $lastInsertedId = Member::latest('id')->value('id');
        $getMemberId = Member::latest('id')->value('id');
        $members = Member::where('member_status', 1)->get();
        $memberCode = str_pad($lastInsertedId, '0', STR_PAD_LEFT);

        if(empty($memberCode)){
            $passMemberId = 1;
        }
        else{
            $passMemberId = $memberCode +1 ;
        }
        $centers = Center::with('branch')->where('center_status', 1)->get();
        return view('members.new_member', compact('centers','passMemberId','getMemberId','members'));

        // $lastInsertedId = Member::latest('id')->value('id');
        // $getMemberId = Member::latest('id')->value('id');
        // $members = Member::where('member_status', 1)->get();

        // if ($lastInsertedId) {
        //     $lastCode = (int) $lastInsertedId->code;
        //     $passMemberId = str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT);
        // } else {
        //     // If no existing member, start with code "001"
        //     $passMemberId = '001';
        // }
        // //return $newCode;

        // $centers = Center::with('branch')->where('center_status', 1)->get();
        // return view('members.new_member', compact('centers','passMemberId','getMemberId','members'));

    }

    // name with initial function after call this function
    private function capitalizeNameWithInitials($initial_name)
    {
        $words = explode('.', $initial_name);
        $capitalizedWords = array_map(function ($word) {
            return mb_strtoupper(mb_substr($word, 0, 1)) . mb_strtolower(mb_substr($word, 1));
        }, $words);
        return implode('.', $capitalizedWords);
    }

    public function memberStore(Request $request)
    {
        try {

            $validated = $request->validate([
                'center_id' => 'required',
                'loan_category_id' => 'required',
                'member_code' => 'required',
                'member_name' => 'required',
                'initial_name' => 'required',
                'member_phone_no' => 'required',
                'member_nic' => 'required',
                'member_address' => 'required',
                // 'member_group_no' => 'required',
                'member_register_date' => 'required',
            ]);

            $centerIdCheck = Center::where('id',$request->center_id)->get()->first();
            $branchIdCheck = Branch::where('id',$centerIdCheck->branch_id)->get()->first();

            $MembeCode = $branchIdCheck->branch_code .'/'. $centerIdCheck->center_code .'/'.$request->member_code;

            $memberRecode = Member::where('member_status', 1)->latest()->first();
            $memberIdCheck = $memberRecode->id + 1;

            $MembeCode = $branchIdCheck->branch_code .'/'. $centerIdCheck->center_code .'/'.$memberIdCheck;

            $member = new Member;

            $member->center_id = $request->center_id;
            $member->loan_category_id = $request->loan_category_id;


        $validatedData = $request->validate([
            'initial_name' => 'required|string|max:255',
        ]);

        $initial_name = $this->capitalizeNameWithInitials($validatedData['initial_name']);
        $member->initial_name = $initial_name;

            $check_loan_catergory_id =$request->loan_category_id;
            $member->member_code = $MembeCode;

            $memberName = $request->member_name;
            $capitalizedMemberName =  ucwords(strtolower($memberName));
            $member->member_name = $capitalizedMemberName;

            $member->member_phone_no = $request->member_phone_no;
            $member->member_nic = $request->member_nic;
            $member->member_address = $request->member_address;
            $member->member_group_no = $request->member_group_no;
            $member->member_register_date = $request->member_register_date;
            $member->member_status = 1;

            $member->save();
            // dd();

            if($check_loan_catergory_id == 2){

                $guarantor = new Guarantor;

                $guarantor->loan_category_id = $request->loan_category_id;

                $guarantor->member_id = $member->id;
                $guarantor->guarantor_01_name = $request->guarantor_01_name;
                $guarantor->guarantor_01_nic = $request->guarantor_01_nic;

                $guarantor->guarantor_01_phone = $request->guarantor_01_phone;
                $guarantor->guarantor_01_address = $request->guarantor_01_address;
                $guarantor->guarantor_01_birthday = $request->guarantor_01_birthday;

                $guarantor->guarantor_01_age = $request->guarantor_01_age;
                $guarantor->guarantor_01_job = $request->guarantor_01_job;
                $guarantor->guarantor_02_name = $request->guarantor_02_name;

                $guarantor->guarantor_02_nic = $request->guarantor_02_nic;
                $guarantor->guarantor_02_phone = $request->guarantor_02_phone;
                $guarantor->guarantor_02_address = $request->guarantor_02_address;
                $guarantor->guarantor_02_birthday = $request->guarantor_02_birthday;
                $guarantor->guarantor_02_age = $request->guarantor_02_age;
                $guarantor->guarantor_02_job = $request->guarantor_02_job;

                 $guarantor->save();

            }
            elseif($check_loan_catergory_id == 1){
                $guarantor = new Guarantor;
                $guarantor->loan_category_id = $request->loan_category_id;

                $guarantor->member_id = $member->id;
                $guarantor->guarantor_01_name = $request->guarantor_01_name;
                $guarantor->guarantor_01_nic = $request->guarantor_01_nic;

                $guarantor->guarantor_01_phone = $request->guarantor_01_phone;
                $guarantor->guarantor_01_address = $request->guarantor_01_address;
                $guarantor->guarantor_01_birthday = $request->guarantor_01_birthday;

                $guarantor->guarantor_01_age = $request->guarantor_01_age;
                $guarantor->guarantor_01_job = $request->guarantor_01_job;
                $guarantor->guarantor_02_name = $request->guarantor_02_name;

                $guarantor->guarantor_02_nic = $request->guarantor_02_nic;
                $guarantor->guarantor_02_phone = $request->guarantor_02_phone;
                $guarantor->guarantor_02_address = $request->guarantor_02_address;
                $guarantor->guarantor_02_birthday = $request->guarantor_02_birthday;
                $guarantor->guarantor_02_age = $request->guarantor_02_age;
                $guarantor->guarantor_02_job = $request->guarantor_02_job;

                 $guarantor->save();
            }
            elseif($check_loan_catergory_id == 3){
                $guarantor = new Guarantor;
                $guarantor->loan_category_id = $request->loan_category_id;
                $guarantor->member_id = $member->id;
                $guarantor->guarantor_member_1 = $request->guarantor_member_1;
                $guarantor->guarantor_member_2 = $request->guarantor_member_2;
                $guarantor->member_relationship = $request->member_relationship;
                $guarantor->member_relationship_pserson_name = $request->member_relationship_pserson_name;
                $guarantor->member_relationship_pserson_nic = $request->member_relationship_pserson_nic;
                $guarantor->member_relationship_pserson_phone = $request->member_relationship_pserson_phone;
                $guarantor->save();
            }
            return redirect('dashboard/member')->with('success', "Member created successfully !");
        } catch (\Exception $exception) {

            return redirect('dashboard/member')->with('error', $exception->getMessage());
        }
    }

    public function getMembers()
    {

        $datas = Member::where('member_status', 1)->orderBy('id', 'DESC')->get();
        return DataTables::of($datas)
            ->addColumn('DT_RowIndex', function () {

                static $index = 1;
                return $index++;
            })
            ->editColumn('center_id', function (Member $data) {
                $centerName = Center::find($data->center_id);
                return $centerName->center_name;
            })

            ->addColumn('actions', function (Member $data) {

                $DeleteUrl = route('member.remove', $data->id);
                $ViewUrl = route('member.view', $data->id);
                $UpdateUrl = route('members.update', $data->id);

                if (Gate::any(['Member access']) && Gate::any(['Member edit']) && Gate::any(['Member delete'])) {
                    return '<div class="ActionBtnList text-center">

                    <a href="' . $ViewUrl . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                    <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation(' . $data->id . ')" data-target="#delectCenter" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>';

                }elseif(Gate::any(['Member access']) && Gate::any(['Member edit'])){

                    return '<div class="ActionBtnList text-center">

                <a href="' . $ViewUrl . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>';

                }elseif(Gate::any(['Member access'])){

                    return '<div class="ActionBtnList text-center">

                <a href="' . $ViewUrl . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                </div>';

                }else{

                }

                // return '<div class="ActionBtnList text-center">

                // <a href="' . $ViewUrl . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                // <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                //     <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation(' . $data->id . ')" data-target="#delectCenter" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                //     </div>


                // ';

            })
            ->rawColumns(['DT_RowIndex', 'center_name', 'member_code', 'member_name', 'member_nic' ,'actions'])
            ->toJson();
    }



    public function removeMember($id)
    {

        try {

            $member = Member::find($id);
            $member = Member::with('center')->where('id', $id)->get()->first();

            $guarantor = Guarantor::with('member')->where('member_id', $member->id)->get()->first();

            $member->member_status = 0;
            $guarantor->guarantor_status = 0;

            if ($member->save() && $guarantor->save()) {

                    return back()->with('success', 'Member deleted successfully !');


            } else { 

                return back()->with('error', 'Could not Member !');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Error occured - ' . $exception->getMessage());
        }
    }


    public function viewMember($id)
    {
        $centers = Center::with('branch')->where('center_status', 1)->get();
        $member = Member::with('center')->where('id', $id)->get()->first();

        $guarantor = Guarantor::with('member')->where('member_id', $member->id)->get()->first();
        $members = Member::where('member_status', 1)->get();

        return view('members.member_single', compact('member','centers','guarantor','members'));
    }


    public function viewMemberSingle($id)
    {

        $centers = Center::with('branch')->where('center_status', 1)->get();
        $member = Member::with('center')->where('id', $id)->get()->first();

        $guarantor = Guarantor::with('member')->where('member_id', $member->id)->get()->first();
        $members = Member::where('member_status', 1)->get();

        return view('members.member_update_view', compact('member','centers','guarantor','members'));
    }

    public function updateMember(Request $request, $id)

    {

        try{

                $validated = $request->validate([
                    'center_id' => 'required',
                    'loan_category_id' => 'required',
                    'member_code' => 'required',
                    'member_name' => 'required',
                    'initial_name' => 'required',
                    'member_phone_no' => 'required',
                    'member_nic' => 'required',
                    'member_address' => 'required',
                    // 'member_group_no' => 'required',
                    'member_register_date' => 'required',

                ] );



                $member = Member::where('id',$id)->get()->first();
                $guarantor = Guarantor::with('member')->where('member_id', $member->id)->get()->first();


                if($member != null){



                    $member->center_id = $request->center_id;
                    $member->loan_category_id = $request->loan_category_id;
                    $check_loan_catergory_id =$request->loan_category_id;
                   $member->member_code = $request->member_code;


                   $memberName = $request->member_name;
                   $capitalizedMemberName =  ucwords(strtolower($memberName));
                    $member->member_name = $capitalizedMemberName;

                    $validatedData = $request->validate([
                        'initial_name' => 'required|string|max:255',
                    ]);

                    $initial_name = $this->capitalizeNameWithInitials($validatedData['initial_name']);
                    $member->initial_name = $initial_name;

                    $member->member_phone_no = $request->member_phone_no;

                    $member->member_nic = $request->member_nic;
                    $member->member_address = $request->member_address;
                    $member->member_group_no = $request->member_group_no;
                    $member->member_register_date = $request->member_register_date;
                    $member->member_status = 1;


                    $member->save();

                    if($check_loan_catergory_id == 2){



                        $guarantor->loan_category_id = $request->loan_category_id;

                        $guarantor->member_id = $request->member_id;


                        $guarantor->guarantor_01_name = $request->guarantor_01_name;
                        $guarantor->guarantor_01_nic = $request->guarantor_01_nic;

                        $guarantor->guarantor_01_phone = $request->guarantor_01_phone;
                        $guarantor->guarantor_01_address = $request->guarantor_01_address;
                        $guarantor->guarantor_01_birthday = $request->guarantor_01_birthday;

                        $guarantor->guarantor_01_age = $request->guarantor_01_age;
                        $guarantor->guarantor_01_job = $request->guarantor_01_job;

                        $guarantor->guarantor_02_name = $request->guarantor_02_name;

                        $guarantor->guarantor_02_nic = $request->guarantor_02_nic;
                        $guarantor->guarantor_02_phone = $request->guarantor_02_phone;
                        $guarantor->guarantor_02_address = $request->guarantor_02_address;
                        $guarantor->guarantor_02_birthday = $request->guarantor_02_birthday;
                        $guarantor->guarantor_02_age = $request->guarantor_02_age;
                        $guarantor->guarantor_02_job = $request->guarantor_02_job;

                         $guarantor->save();



                    }
                    elseif($check_loan_catergory_id == 1){

                        $guarantor->loan_category_id = $request->loan_category_id;
                        $guarantor->member_id = $request->member_id;
                        $guarantor->guarantor_member_1 = $request->guarantor_member_1;
                        $guarantor->guarantor_member_2 = $request->guarantor_member_2;

                        $guarantor->member_relationship = $request->member_relationship;
                        $guarantor->member_relationship_pserson_name = $request->member_relationship_pserson_name;
                        $guarantor->member_relationship_pserson_nic = $request->member_relationship_pserson_nic;
                        $guarantor->member_relationship_pserson_phone = $request->member_relationship_pserson_phone;
                        $guarantor->save();
                    }
                    elseif($check_loan_catergory_id == 3){

                        $guarantor->loan_category_id = $request->loan_category_id;
                        $guarantor->member_id = $request->member_id;
                        $guarantor->guarantor_member_1 = $request->guarantor_member_1;
                        $guarantor->guarantor_member_2 = $request->guarantor_member_2;
                        $guarantor->member_relationship = $request->member_relationship;
                        $guarantor->member_relationship_pserson_name = $request->member_relationship_pserson_name;
                        $guarantor->member_relationship_pserson_nic = $request->member_relationship_pserson_nic;
                        $guarantor->member_relationship_pserson_phone = $request->member_relationship_pserson_phone;
                        $guarantor->save();
                    }
                    return redirect('dashboard/member')->with('success',"Member updated successfully !");
                }else{
                    return redirect('dashboard/member')->with('error',"Could not find the Member !");
                }
        }catch(\Exception $exception){
            return back()->with('error',$exception->getMessage());
        }
    }

    public function check(Request $request)
    {
        $member_nic = $request->input('member_nic');
        $existingEmail = Member::where('member_nic', $member_nic)->first();

        if ($existingEmail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Member NIC already exists.'
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Member NIC is available.'
            ]);
        }
    }


// check in mobile
    public function mobileViewMembers()
    {
        $branchs = Branch::where('branch_status', 1)->get();
        return view('mobile-view.members.all_members', compact('branchs'));
    }

    public function mobileGetMembers()
    {

        $datas = Member::where('member_status', 1)->orderBy('id', 'DESC')->get();
      
        return DataTables::of($datas)
           
           
            ->addColumn('actions', function (Member $data) {

                // $DeleteUrl = route('member.remove', $data->id);
                $ViewUrl = route('member.view', $data->id);
                // $UpdateUrl = route('members.update', $data->id);

                if (Gate::any(['Member access']) && Gate::any(['Member edit']) && Gate::any(['Member delete'])) {
                    return '<div class="ActionBtnList text-center">

                    <a href="' . $ViewUrl . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                   ';

                }elseif(Gate::any(['Member access']) && Gate::any(['Member edit'])){

                    return '<div class="ActionBtnList text-center">

                <a href="' . $ViewUrl . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a> ';

                }elseif(Gate::any(['Member access'])){

                    return '<div class="ActionBtnList text-center">

                <a href="' . $ViewUrl . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                </div>';

                }else{

                }
 

            })
            ->rawColumns(['member_code','member_nic','actions'])
            ->toJson();
    }


}
