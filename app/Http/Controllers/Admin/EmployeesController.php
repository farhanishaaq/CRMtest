<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Employee::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $edit_button = '<a href="' . route('admin.employees.edit', [$data->id]) . '" class="btn btn-icon btn-info text-center" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-pencil  align-middle " style="padding:6px; font-size: x-large"></i></a>';
                    $delete_button = '<button data-id="' . $data->id . '" class="delete-single btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="delete"><i class="fa fa-trash font-size-24 align-middle"></i></button>';
                    $detail_button = '<button data-id="' . $data->id . '" class="details-single btn btn-success btn-icon" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-placement="top" title="delete"><i class="fa fa-info font-size-24 align-middle"></i></button>';

                    return '<div class="btn-icon-list">' . $edit_button . ' ' . $delete_button .' ' . $detail_button .  '</div>';



                }) ->addColumn('company_name', function($data){

                    $nameC = $data->company->name;

                    return $nameC;
                })
                ->rawColumns(['action','company_name'])
                ->make(true);
        }
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
        if($request->id != null && Employee::where('id',$request->id)->exists()){

            if(!Employee::where(['email'=>$validated['email']])->exists()){
                $Employee = Employee::where(['id'=>$request->id])->update([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'company_id' => $validated['company_id'],
                    'email' => $validated['email'],
                    'phone_number' => $request->phone_number,
                ]);
            }else{
                $Employee = Employee::where(['id'=>$request->id])->update([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'company_id' => $validated['company_id'],
                    'phone_number' => $request->phone_number,
                ]);
            }

            return response()->json(['success' => true, 'message' => "Employee is successfully updated"], 200);
        }else {
            if(!Employee::where(['email'=>$validated['email']])->exists()) {
                $Employee = Employee::create([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'company_id' => $validated['company_id'],
                    'email' => $validated['email'],
                    'phone_number' => $request->phone_number,
                ]);
                return response()->json(['success' => true, 'message' => "Employee is successfully created"], 200);
            } else{
                    return response()->json(['success' => false, 'message' => "Email already exists"], 200);

                }
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function detail(string $id)
    {
        if(Employee::where('id',$id)->exists()) {
            $employee = Employee::where('id',$id)->first();
            $reviewDatail =  view('admin.employee.detail', ['employees'=>$employee])->render();
            return response()->json(['success'=> true ,'data' =>$reviewDatail], 200);
        }else{
            return response()->json(['success'=> false ,'message' =>"Invalid attempted"], 200);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        if(Employee::where('id',$id)->exists()) {
            $employee = Employee::where('id',$id)->first();
            return view('admin.employee.edit',['employee'=>$employee]);
        }else{
            return response()->json(['success'=> false ,'message' =>"Invalid attempted"], 200);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function autocompleteCompany(Request $request)
    {
        $data = Company::select("name as value", "id")
            ->where('name', 'LIKE', '%'. $request->get('search'). '%')
            ->get();

        return response()->json($data);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(Employee::where('id',$id)->exists()) {
            Employee::where('id',$id)->delete();
            return response()->json(['success'=> true ,'message' =>"Employee is successfully deleted"], 200);
        }else{
            return response()->json(['success'=> false ,'message' =>"Invalid attempted"], 200);
        }
    }
}
