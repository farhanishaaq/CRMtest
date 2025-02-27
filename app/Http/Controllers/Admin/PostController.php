<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Jobs\ProcessFileUpload;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Post::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $edit_button = '<a href="' . route('admin.posts.edit', [$data->id]) . '" class="btn btn-icon btn-info text-center" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-pencil  align-middle " style="padding:6px; font-size: x-large"></i></a>';
                    $delete_button = '<button data-id="' . $data->id . '" class="delete-single btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="delete"><i class="fa fa-trash font-size-24 align-middle"></i></button>';
                    $detail_button = '<button data-id="' . $data->id . '" class="details-single btn btn-success btn-icon" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-placement="top" title="delete"><i class="fa fa-info font-size-24 align-middle"></i></button>';

                    return '<div class="btn-icon-list">' . $edit_button . ' ' . $delete_button .' ' . $detail_button .  '</div>';



                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create([
            'title'=>$validated['title'],
            'admin_id'=>Auth::guard('admin')->user()->id,
            'description'=>$validated['description'],
            'slug'=>'admin_post'
        ]);
        foreach ($validated['categories'] as $category) {
            $postCategory = PostCategory::create([
                'post_id'=>$post->id,
                'category_id'=> $category
        ]);
        }
        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('temp', $fileName, 'public'); // Store in public/temp
                $filePaths[] = $filePath;

                $postFile = PostFile::create([
                    'post_id' => $post->id,
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'file_type' => $file->getMimeType(),
                ]);
            }
        }



        if ($validated['files']) {
            ProcessFileUpload::dispatch($post, $filePaths);
        }
        return response()->json(['success' => true, 'message' => "Post is successfully Created"], 200);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
