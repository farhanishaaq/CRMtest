@extends('admin.layouts.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-header" >
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Posts
        </h3>
        <h4 class="card-title">Recent Updates</h4>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <div class="pr-1 mb-3 mb-xl-0">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary  mr-2">
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
    <div class="row dt-row" >
        <div class="col-12 grid-margin stretch-card">
            <div class="card p-0">
                <div class="card-body p-2">
                        <table class="table mt-2" id="data-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailInfo">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="{{asset('assets/js/custom/posts.js')}}"></script>
@endsection
