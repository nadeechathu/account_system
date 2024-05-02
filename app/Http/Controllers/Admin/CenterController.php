<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Center;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CenterController extends Controller
{
    public function center()
    {
        $branchs = Branch::where('branch_status', 1)->get();
        //$users = User::where('user_type', 'exofficers')->get();
        return view('centers.all_centers', compact('branchs'));
    }
    public function centerStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'branch_id' => 'required',
                'center_code' => 'required',
                'center_name' => 'required',
                'executive_person' => 'required',
                'center_allocate_date' => 'required',
            ]);

            $center = new Center;
            $center->branch_id = $request->branch_id;
            $center->center_code = $request->center_code;
            $center->center_name = $request->center_name;
            $center->center_allocate_date = $request->center_allocate_date;
            $center->executive_person = $request->executive_person;
            $center->center_status = 1;
            $center->save();

            return back()->with('success', "Center created successfully !");
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function getCenters()
    {

        $datas = Center::where('center_status', 1)->orderBy('id', 'DESC')->get();
        return DataTables::of($datas)
            ->addColumn('DT_RowIndex', function () {

                static $index = 1;
                return $index++;
            })
            ->editColumn('branch_id', function (Center $data) {
                $branchName = Branch::find($data->branch_id);

                return $branchName->branch_name;
            })
            ->addColumn('center_allocate_date', function (Center $data) {
                        $statusUI = "";

                        if ($data->center_allocate_date == 1) {
                            $statusUI = 'Monday';
                        } elseif ($data->center_allocate_date == 2){
                            $statusUI = 'Tuesday';
                        }elseif ($data->center_allocate_date == 3) {
                            $statusUI = 'Wednesday';
                        }elseif ($data->center_allocate_date == 4) {
                            $statusUI = 'Thursday';
                        }elseif ($data->center_allocate_date == 5) {
                            $statusUI = 'Friday';
                        }elseif ($data->center_allocate_date == 6) {
                            $statusUI = 'Saturday';
                        }else{
                            $statusUI = 'Sunday';
                        }
                          return $statusUI;
                        })

                        ->addColumn('executive_person', function (Center $data) {
                            $statusUI = "";

                            if ($data->executive_person == 1) {
                                $statusUI = 'Thiwanka Senarath';
                            } elseif ($data->executive_person == 2){
                                $statusUI = 'Indika Anura';
                            }elseif ($data->executive_person == 3){
                                $statusUI = 'Tharindu Dilshan';
                            }else{
                                $statusUI = 'Visuka Gayashan';
                            }
                              return $statusUI;
                            })

            ->addColumn('actions', function (Center $data) {

                $DeleteUrl = route('centers.remove', $data->id);
                $UpdateUrl = route('centers.update', $data->id);

                if (Gate::any(['Center create']) && Gate::any(['Center delete'])) {

                    return '<div class="ActionBtnList text-center">

                    <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation('. $data->id. ')" data-target="#delectCenter" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>';

                } elseif(Gate::any(['Center create'])){
                    return '<div class="ActionBtnList text-center">

                    <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                    </div>';
                }else{

                }

                // return '<div class="ActionBtnList text-center">

                //     <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                //     <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation('. $data->id. ')" data-target="#delectCenter" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                //     </div>';
            })
            ->rawColumns(['DT_RowIndex', 'branch_name', 'center_code', 'center_name', 'actions'])
            ->toJson();
    }



    public function removeCenter($id)
    {

        try {

            $center = Center::find($id);
            $center->center_status = 0;
            if ($center->save()) {
                return back()->with('success', 'Center deleted successfully !');
            } else {

                return back()->with('error', 'Could not Center !');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Error occured - ' . $exception->getMessage());
        }
    }


    public function viewCenterSingle($id)
    {

        $branchs = Branch::where('branch_status', 1)->get();
        $center = Center::where('id', $id)->get()->first();
        return view('centers.center_update_view', compact('center','branchs'));
    }

    public function updateCenter(Request $request, $id)

    {
        try{
                $validated = $request->validate([
                    'branch_id' => 'required',
                    'center_code' => 'required',
                    'center_name' => 'required',
                    'executive_person' => 'required',
                    'center_allocate_date' => 'required',
                ]

            );

                $center = Center::where('id',$id)->get()->first();

                if($center != null){

                    $center->branch_id = $request->branch_id;
                    $center->center_code = $request->center_code;
                    $center->center_name = $request->center_name;
                    $center->center_allocate_date = $request->center_allocate_date;
                    $center->executive_person = $request->executive_person;
                    $center->center_status = 1;

                    $center->save();

                    return redirect('dashboard/center')->with('success',"Center updated successfully !");

                }else{

                    return redirect('dashboard/center')->with('error',"Could not find the Center !");
                }

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }
    }
    public function getCenterCode($id)
    {
        $center_id_set = Center::with('branch')->where('id',$id)
                                    ->first();
        $centerCountForBranch = Center::where('branch_id',$center_id_set->branch_id)->count();

        $nextBranch = $centerCountForBranch + 1;
        $brach_code_set =  $center_id_set->branch->branch_code.'/'.$nextBranch;

        return response([ 'status' => 'success', 'branch_id' => $center_id_set, 'branch_code' => $brach_code_set , 'message' => "success"], 200);
    }


}
