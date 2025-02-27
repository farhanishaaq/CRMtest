@extends('admin.layouts.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-header" >
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Create Employees
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
                        <input type="hidden" name="id" value="{{$employee->id}}" id="id">
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first_name">First Name <span
                                            class="error text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="first_name"
                                           id="first_name"
                                           value="{{$employee->first_name}}"
                                           placeholder="First Name" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div> <div class="col-12">
                                <div class="form-group">
                                    <label for="last_name">Last Name <span
                                            class="error text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="last_name"
                                           id="last_name"
                                           value="{{$employee->last_name}}"
                                           placeholder="Last Name" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email <span
                                            class="error text-danger">*</span></label>
                                    <input type="email" class="form-control"
                                           name="email"
                                           id="email"
                                           value="{{$employee->email}}"
                                           placeholder="email" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="form-group">
                                    <label for="search">Company</label>
                                    <input class="typeahead form-control" id="search" value="{{$employee->company->name}}" type="text">
                                    <input  id="company" name="company_id" value="{{$employee->company->id}}" type="hidden" required>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Phone </label>
                                    <input type="text" class="form-control"
                                           name="phone_number"
                                           id="phone"
                                           value="{{$employee->phone_number}}"
                                           placeholder="Phone" />
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-0 mt-3 justify-content-end">
                                    <div>
                                        <button type="submit"
                                                class="btn btn-success">Update</button>
                                        <a href="{{ route('admin.employees.index') }}"
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

    <script src="{{asset('assets/js/custom/employee.js')}}"></script>

@endsection


