@extends('layout')

@section('title', __('Categories'))

@section('content')
    @include('category.model')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Categories') }}</li>
                        </ol>
                    </div>

                    <h4 class="page-title"> {{ __('Categories') }}
                    </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ __('Categories') }}</h5>
                        <div class="col-sm-12 mb-3">
                            <a title="{{ __('Add New Category') }}" href="{{ route('categories.create') }}"
                                class="btn btn-success btn-rounded btn-sm ms-3"><i class="mdi mdi-plus"></i>
                                {{ __('Add New Category') }}</a>
                        </div><!-- end col-->

                        <div class="table-responsive">
                            <table id="categoriesTable" class="table table-striped w-100 dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">{{ __('Name') }}</th>
                                        <th class="border-bottom-0">{{ __('Status') }}</th>
                                        <th class="border-bottom-0">{{ __('Creation Date') }}</th>
                                        <th class="border-bottom-0 text-center">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection

@include('category.script')
