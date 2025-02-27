@extends('admin.layouts.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-header" >
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Create Post
        </h3>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row" >
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                    <form method="POST" data-parsley-validate="" id="addEditForm" role="form">
                        @csrf


                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">Title <span
                                            class="error text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="title"
                                           id="title"
                                           placeholder="title" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div><div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description <span
                                            class="error text-danger">*</span></label>
                                    <textarea type="text" class="form-control"
                                           name="description"
                                           id="description"
                                              placeholder="description" required></textarea>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="logo">Files <span
                                            class="error text-danger">*</span></label>
                                    <input type="file" class="form-control"
                                           name="files"
                                           id="files"
                                           multiple="multiple"
                                           placeholder="logo" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label for="categories">Categories <span
                                            class="error text-danger">*</span></label>
                                    <select name="categories[]" id="categories" class="form-control" multiple="multiple" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group mb-0 mt-3 justify-content-end">
                                    <div>
                                        <button type="submit"
                                                class="btn btn-success">Submit</button>
                                        <a href="{{ route('admin.companies.index') }}"
                                           class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')

    <script src="{{asset('assets/js/custom/posts.js')}}"></script>
@endsection


