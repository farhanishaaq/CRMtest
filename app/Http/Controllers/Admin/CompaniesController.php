<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->ajax()){
            $data = Company::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $edit_button = '<a href="' . route('admin.companies.edit', [$data->id]) . '" class="btn btn-icon btn-info text-center" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-pencil  align-middle " style="padding:6px; font-size: x-large"></i></a>';
                    $delete_button = '<button data-id="' . $data->id . '" class="delete-single btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="delete"><i class="fa fa-trash font-size-24 align-middle"></i></button>';
                    $detail_button = '<button data-id="' . $data->id . '" class="details-single btn btn-success btn-icon" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-placement="top" title="delete"><i class="fa fa-info font-size-24 align-middle"></i></button>';

                    return '<div class="btn-icon-list">' . $edit_button . ' ' . $delete_button .' ' . $detail_button .  '</div>';



                }) ->addColumn('image', function($data){

                    $image = "<img src='". asset($data->logo) ."' width='200' height='auto'>";

                    return $image;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('admin.company.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        if($request->id != null && Company::where('id',$request->id)->exists()){
            if($validated['logo'] != null) {
                $imagePath = $validated['logo']->store('public/logos');
                $imageUrl = Storage::url($imagePath);
                $company = Company::where(['id'=>$request->id])->update([
                    'name' => $validated['name'],
                    'logo' => $imageUrl,
                    'email' => $validated['email'],
                    'website' => $request->website,
                ]);
            }else{
                $company = Company::where(['id'=>$request->id])->update([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'website' => $request->website,]);
            }
            return response()->json(['success' => true, 'message' => "Company is successfully updated"], 200);
        }else{

            if(!Company::where('email',$validated['email'])->exists()) {
                $imagePath = $validated['logo']->store('public/logos');
                $imageUrl = Storage::url($imagePath);
                $company = Company::create([
                    'name' => $validated['name'],
                    'logo' => $imageUrl,
                    'email' => $validated['email'],
                    'website' => $request->website,
                ]);
                return response()->json(['success' => true, 'message' => "Company is successfully created"], 200);
            }else{
                return response()->json(['success' => false, 'message' => "Email already in register. Please use an other"], 200);

            }
            }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    } /**
     * Display the specified resource.
     */
    public function detail(string $id)
    {
        if(Company::where('id',$id)->exists()) {
            $company = Company::where('id',$id)->first();
           $reviewDatail =  view('admin.company.detail', ['company'=>$company])->render();
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
        if(Company::where('id',$id)->exists()) {
            Company::where('id',$id)->delete();
            return response()->json(['success'=> false ,'message' =>"Company is successfully deleted"], 200);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Company::where('id',$id)->exists()) {
            Company::where('id',$id)->delete();
            return response()->json(['success'=> true ,'message' =>"Employee is successfully deleted"], 200);


        }else{
            return response()->json(['success'=> false ,'message' =>"Invalid attempted"], 200);
        }
    }
}
