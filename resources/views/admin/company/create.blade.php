@extends('admin.layouts.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-header" >
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Create Company
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
                                    <label for="email">Name <span
                                            class="error text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           id="name"
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
                                           placeholder="email" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="logo">Logo <span
                                            class="error text-danger">*</span></label>
                                    <input type="file" class="form-control"
                                           name="logo"
                                           id="logo"
                                           placeholder="logo" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control"
                                           name="website"
                                           id="website"
                                           placeholder="website" />
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

    <script src="{{asset('assets/js/custom/companies.js')}}"></script>
@endsection


