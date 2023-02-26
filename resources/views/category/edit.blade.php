@extends('layout')

@section('title', __('Edit Category'))

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
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Edit Category') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('Edit Category') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="formId" action="{{ route('categories.update', $category->id) }}">
                            @method('put')
                            @csrf

                            <div class="form-group row">
                                @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $key)
                                    <div class="col-sm-6">
                                        <span class="text-danger" id="name.{{ $key }}_error"></span>
                                        <div class="form-floating mb-3 col-sm-12">
                                            <input type="text" name="name[{{ $key }}]" class="form-control"
                                                id="floatingName" placeholder="{{ __('Name') }}"
                                                value="{{ $category->getTranslation('name', $key) }}">
                                            <label for="floatingName">{{ __('Name') }}
                                                ({{ $key }})
                                                <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <div class="form-group row mb-3">

                                <div class="col-sm-6">
                                    <div class="form-group row mb-3">

                                        <label class="col-sm-4 control-label">{{ __('Active') }}</label>

                                        <input type="checkbox" id="switch" name="status" data-switch="success"
                                            {{ $category->is_active === 0 ? : 'checked' }} />
                                        <label for="switch" data-on-label="{{ __('Yes') }}"
                                            data-off-label="{{ __('No') }}"></label>

                                    </div>
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
                            window.location.href = "{{ route('categories.index') }}";
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
