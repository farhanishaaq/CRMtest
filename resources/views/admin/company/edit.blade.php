@extends('admin.layouts.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-header" >
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Edit Company
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <div class="pr-1 mb-3 mb-xl-0">
                        <a href="{{ route('admin.companies.create') }}" class="btn btn-primary  mr-2">
                            <i class="mdi mdi-plus-circle"></i> Add New
                        </a>
                    </div>

                </li>
            </ul>
        </nav>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row" >
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" data-parsley-validate="" id="addEditForm" role="form">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{$company->id}}" >

                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Name <span
                                            class="error text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           id="name"
                                           value="{{$company->name}}"
                                           placeholder="email" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div><div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email <span
                                            class="error text-danger">*</span></label>
                                    <input type="email" class="form-control"
                                           name="email"
                                           id="email"
                                           value="{{$company->email}}"
                                           placeholder="email" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="logo">Logo <span
                                            class="error text-danger">*</span></label>
                                    <img src="{{asset($company->logo)}}" width="250" height="auto">
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div> <div class="col-12">
                                <div class="form-group">
                                    <label for="logo">Update Logo</label>
                                    <input type="file" class="form-control"
                                           name="logo"
                                           id="logo"
                                           placeholder="Update logo" />
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control"
                                           name="website"
                                           id="website"
                                           value="{{$company->website}}"
                                           placeholder="website" />
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group mb-0 mt-3 justify-content-end">
                                    <div>
                                        <button type="submit"
                                                class="btn btn-success">Update</button>
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

    <script src="{{asset('assets/js/custom/companies.js')}}"></script>
@endsection

