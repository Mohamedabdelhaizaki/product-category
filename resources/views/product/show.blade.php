@extends('layout')

@section('title', __('Show Product'))

@section('content')
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
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Products') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Show Product') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('Show Product') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row">
                            @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $key)
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3 col-sm-12">
                                        <input type="text" class="form-control" id="floatingName[{{ $key }}]"
                                            placeholder="{{ __('Name') }}"
                                            value="{{ $product->getTranslation('name', $key) }}" disabled>
                                        <label for="floatingName[{{ $key }}]">{{ __('Name') }}
                                            ({{ $key }})
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group row">
                            @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $key)
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3 col-sm-12">
                                        <input type="text" class="form-control"
                                            id="floatingDescription[{{ $key }}]"
                                            placeholder="{{ __('Description') }}"
                                            value="{{ $product->getTranslation('description', $key) }}" disabled>
                                        <label for="floatingDescription[{{ $key }}]">{{ __('Description') }}
                                            ({{ $key }})
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group row mb-3">

                            <div class="col-sm-6">
                                <div class="form-floating mb-3 col-sm-12">
                                    <input type="text" name="Category" class="form-control" id="floatingCategory"
                                        placeholder="{{ __('Category') }}" value="{{ $product->category?->name }}"
                                        disabled>
                                    <label for="floatingCategory">{{ __('Category') }}</label>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-floating mb-3 col-sm-12">
                                    <input type="text" name="status" class="form-control" id="floatingStatus"
                                        placeholder="{{ __('Status') }}"
                                        value="{{ $product->is_active === 1 ? __('Active') : __('Inactive') }}" disabled>
                                    <label for="floatingStatus">{{ __('Status') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="m-2">
                            <label class="m-2" for="product_image">{{ trans('Image') }}</label>
                            <a href={{ $product->getFirstMediaUrl('product-image') }} target="_blank">
                                <img src="{{ $product->getFirstMediaUrl('product-image') }}" alt="image"
                                    class="img-fluid img-thumbnail" width="100" />
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection
