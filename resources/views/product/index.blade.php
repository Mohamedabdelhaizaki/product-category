@extends('layout')

@section('title', __('Products'))

@section('content')
    @include('product.model')

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
                            <li class="breadcrumb-item active">{{ __('Products') }}</li>
                        </ol>
                    </div>

                    <h4 class="page-title"> {{ __('Products') }}
                    </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ __('Products') }}</h5>
                        <div class="row mb-2">

                            <div class="col-sm-6 mb-3">
                                <a title="{{ __('Add New Product') }}" href="{{ route('products.create') }}"
                                    class="btn btn-success btn-rounded btn-sm ms-3"><i class="mdi mdi-plus"></i>
                                    {{ __('Add New Product') }}</a>
                            </div><!-- end col-->

                            <div class="col-sm-6">
                                <label for="category">{{ __('Category') }}</label>

                                <select name="category" id="category" data-placeholder="{{ __('Select Category') }}"
                                    data-dir="{{ __('ltr') }}" class="form-control select2" data-toggle="select2">
                                    <option value="all" selected> {{ __('All') }} </option>
                                    <option value="none"> {{ __('None') }} </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="productsTable" class="table table-striped w-100 dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">{{ __('Name') }}</th>
                                        <th class="border-bottom-0">{{ __('Category') }}</th>
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

@include('product.script')
