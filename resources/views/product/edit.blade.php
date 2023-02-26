@extends('layout')

@section('title', __('Edit Product'))

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
                            <li class="breadcrumb-item active">{{ __('Edit Product') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('Edit Product') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="formId" action="{{ route('products.update', $product->id) }}">
                            @method('put')
                            @csrf

                            <div class="form-group row">
                                @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $key)
                                    <div class="col-sm-6">
                                        <span class="text-danger" id="name.{{ $key }}_error"></span>
                                        <div class="form-floating mb-3 col-sm-12">
                                            <input type="text" name="name[{{ $key }}]" class="form-control"
                                                id="floatingName" placeholder="{{ __('Name') }}"
                                                value="{{ $product->getTranslation('name', $key) }}">
                                            <label for="floatingName">{{ __('Name') }}
                                                ({{ $key }})
                                                <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group row">
                                @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $key)
                                    <div class="col-sm-6">
                                        <span class="text-danger" id="description.{{ $key }}_error"></span>
                                        <div class="form-floating mb-3 col-sm-12">
                                            <input type="text" name="description[{{ $key }}]"
                                                class="form-control" id="floatingDescription"
                                                placeholder="{{ __('Description') }}"
                                                value="{{ $product->getTranslation('description', $key) }}">
                                            <label for="floatingDescription">{{ __('Description') }}
                                                ({{ $key }})
                                                <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label for="productImage" class="col-sm-2">{{ __('Image') }}</label>

                                <input type="file" id="image" accept="image/*" name="productImage">
                                <img src="{{ $product->getFirstMediaUrl('product-image') }}" id="productImage"
                                    width="80px" height="80px" />

                            </div>



                            <div class="form-group row mb-3">
                                <div class="col-sm-6">
                                    <span class="text-danger" id="category_id_error"></span>
                                    <select name="category_id" data-placeholder="{{ __('Select Category') }}"
                                        data-dir="{{ __('ltr') }}" class="form-control select2" data-toggle="select2">
                                        <option disabled value="">
                                            {{ __('Select Category') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4 control-label">{{ __('Active') }}</label>

                                    <input type="checkbox" id="switch" name="status" data-switch="success"
                                        {{ $product->is_active === 0 ?: 'checked' }} />
                                    <label for="switch" data-on-label="{{ __('Yes') }}"
                                        data-off-label="{{ __('No') }}"></label>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-info" id="saveButton">{{ __('Save') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection

@section('scripts')
    <script>
        $(function() {

            let saveButton = true;

            function toggleSaveButton() {
                if (saveButton) {
                    saveButton = false;
                    $('#saveButton, #saveAndNewButton').attr('disabled', true);
                    $("#saveButton").html("{{ __('Save') }}" +
                        ' <i class="spinner-border spinner-border-sm"></i>');
                    $("#saveAndNewButton").html("{{ __('Save & New') }}" +
                        ' <i class="spinner-border spinner-border-sm"></i>');
                } else {
                    saveButton = true;
                    $('#saveButton, #saveAndNewButton').attr('disabled', false);
                    $("#saveButton").html("{{ __('Save') }}");
                    $("#saveAndNewButton").html("{{ __('Save & New') }}");
                }
            }

            $("#image").change(function() {
                readURL(this);
            });


            function readURL(input) {

                var filePath = input.value;
                console.log(filePath)
                var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.webp)$/i;

                if (!allowedExtensions.exec(filePath) && filePath != '') {

                    $.NotificationApp.send("", "{{ trans('admin.invalidImageType') }}",
                        "top-right", "rgba(0,0,0,0.2)",
                        "error");


                }

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("#productImage").removeAttr("hidden");
                        $('#productImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#productImage").attr("hidden", true);
                    $('#productImage').attr('src', '');
                }
            }

            $('#formId').submit(function(e) {
                e.preventDefault();
                $('span[id*="_error"]').html('');
                $('*input').removeClass('is-invalid');
                var form = $('#formId')[0];
                var data = new FormData(form);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    }
                });
                $.ajax({
                    url: $('#formId').attr('action'),
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: toggleSaveButton(),
                    success: function(response) {
                        toggleSaveButton();
                        if (response.status) {
                            window.location.href = "{{ route('products.index') }}";
                        }
                    },
                    error: function(data) {
                        toggleSaveButton();
                        $.each(data.responseJSON.errors, function(name, message) {

                            let inputName = name;
                            let inputError = name + '_error';


                            if (inputName.includes('.')) {
                                let convertArray = inputName.split('.');
                                inputName = convertArray[0] + '[' + convertArray[1] +
                                    ']'
                            }

                            $('input[name="' + inputName + '"]').addClass(
                                'is-invalid');

                            $('span[id="' + inputError + '"]').html(
                                `<small>${message}</small>`);
                        });
                    }
                });
            });
        });
    </script>
@endsection
