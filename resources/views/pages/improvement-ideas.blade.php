@extends('layouts.master')
@section('content')
    {{-- Header --}}
    <div class="header">
        <div class="container">
            <div class="row">
                @include('partials.logo', ['color' => true])
                <div class="col d-flex flex-row align-items-center">
                    <h1 class="header__title">{!! $utils->content('header_title', $page) !!}</h1>
                    <div class="header__line"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- Image --}}
    <div class="container">
        <div class="row">
            <div class="col-space-left col">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('/img/pages/improvement-ideas/main.jpg') }}" alt=""
                            class="header__image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Subtitle --}}
    <div class="container">
        <div class="row">
            <div class="col-space-left col">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <h2 class="header__subtitle">{!! $utils->content('header_subtitle', $page) !!}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Content --}}
    <div class="content container">
        <div class="row">
            <div class="col-space-left col">
                <div class="row">
                    <div class="col-12 col-xl-8 form-wrapper" id="contact">
                        {{-- form --}}
                        <form action="{{ action('ImprovementIdeaController@send') }}#contact" method="POST"
                            class="contact-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-md">
                                    <div class="custom-select" onclick="toggleOptions()">
                                        <div class="selected-option"> {!! $utils->content('form_department', $page) !!}</div>
                                        <div class="options">
                                            <div class="option" onclick="selectOption('{!! $utils->content('form_production', $page) !!}', this)">
                                                {!! $utils->content('form_production', $page) !!}
                                            </div>
                                            <div class="option" onclick="selectOption('{!! $utils->content('form_maintenance', $page) !!}', this)">
                                                {!! $utils->content('form_maintenance', $page) !!}
                                            </div>
                                            <div class="option" onclick="selectOption('{!! $utils->content('form_quality', $page) !!}', this)">
                                                {!! $utils->content('form_quality', $page) !!}
                                            </div>
                                            <div class="option" onclick="selectOption('{!! $utils->content('form_prl', $page) !!}', this)">
                                                {!! $utils->content('form_prl', $page) !!}
                                            </div>
                                            <div class="option" onclick="selectOption('{!! $utils->content('form_other', $page) !!}', this)">
                                                {!! $utils->content('form_other', $page) !!}
                                            </div>

                                        </div>

                                        <input type="hidden" name="department" id="department-input"
                                            value="{{ old('department') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Campo de Nombre y Apellidos (ocupa más espacio que el checkbox de anónimo) -->
                                <div class="col-12 col-md-8">
                                    <input type="text" placeholder=" {{ $utils->content('form_name_surname', $page) }}*" name="name_and_surname"
                                        value="{{ old('name_and_surname') }}" id="name-input">
                                </div>

                                <!-- Campo de Checkbox "Anónimo" (ocupa menos espacio) -->
                                <div class="col-12 col-md-4 anonymous">
                                    <input type="checkbox" name="anonymous" id="anonymous">
                                    <label for="anonymous"> {!! $utils->content('form_anonymous', $page) !!}</label>
                                </div>
                            </div>

                            <!-- Nueva fila para la fecha y sección -->
                            <div class="row">
                                <!-- Campo de Fecha (ocupa menos espacio que el de sección) -->
                                <div class="col-12 col-md-4">
                                    <input type="date" placeholder=" {!! $utils->content('form_date', $page) !!}*" name="date"
                                        value="{{ old('date') }}" class="date">
                                </div>

                                <!-- Campo de Sección (ocupa más espacio que el de fecha) -->
                                <div class="col-12 col-md-8">
                                    <input type="text" placeholder=" {!! $utils->content('form_section', $page) !!}*" name="section"
                                        value="{{ old('section') }}">
                                </div>
                            </div>

                            <!-- Fila para la descripción de la situación actual -->
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="current_situation_desc" id="form-current-situation" cols="30" rows="10"
                                        placeholder=" {!! $utils->content('form_current_situation_desc', $page) !!}*" maxlength="2048">{{ old('current_situation_desc') }}</textarea>
                                </div>
                            </div>

                            <!-- Fila para la propuesta de solución -->
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="proposed_solution" id="form-proposed-solution" cols="30" rows="10"
                                        placeholder=" {!! $utils->content('form_proposed_solution', $page) !!}*" maxlength="2048">{{ old('proposed_solution') }}</textarea>
                                </div>
                            </div>

                            <!-- Fila para la mejora esperada -->
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="expected_improvement" id="form-expected-improvement" cols="30" rows="10"
                                        placeholder=" {!! $utils->content('form_expected_improvement', $page) !!}*" maxlength="2048">{{ old('expected_improvement') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col pb-4">
                                    <div class="required_fields">
                                        <span>*</span> {!! $utils->content('form_required_fields', $page) !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Captcha -->
                            <div class="row">
                                <div class="col-12 col-md mb-2">
                                    {!! NoCaptcha::renderJs(app()->getLocale()) !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                                <div class="col-12 col-md mb-2">
                                    <label for="form-legal">
                                        <input type="checkbox" name="legal" id="form-legal" value="1">
                                        {!! $utils->content('form_privacy_policy', $page) !!}
                                    </label>
                                </div>
                                <div class="col-12 col-md mb-2">
                                    <input type="submit" value="{!! $utils->content('form_send_message', $page) !!}" class="btn">
                                </div>
                            </div>

                            {{-- Errors --}}
                            @if (count($errors))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Success --}}
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Map --}}
    <div class="map">
        <iframe src="https://snazzymaps.com/embed/229762" width="100%" height="570px" style="border:none;"
            class="d-none d-lg-block"></iframe>
        <iframe src="https://snazzymaps.com/embed/233512" width="100%" height="300px" style="border:none;"
            class="d-block d-lg-none"></iframe>
    </div>

    <script>
        function selectOption(value, element) {
            document.querySelector('.selected-option').innerHTML = value;

            document.getElementById('department-input').value = value;

            var options = document.querySelectorAll('.option');
            options.forEach(option => option.classList.remove('active'));
            element.classList.add('active');
        }

        function toggleOptions() {
            const options = document.querySelector('.options');

            setTimeout(() => {
                options.classList.toggle('show');
            }, 200);
        }


        document.addEventListener('click', function(event) {
            const customSelect = document.querySelector('.custom-select');
            const options = document.querySelector('.options');

            if (!customSelect.contains(event.target) && options.classList.contains('show')) {
                options.classList.remove('show');
            }
        });


        const anonymousCheckbox = document.getElementById('anonymous');
        const nameInput = document.getElementById('name-input');

        anonymousCheckbox.addEventListener('change', function() {
            if (this.checked) {
                nameInput.value = '';

                nameInput.disabled = true;
                nameInput.style.cursor = 'not-allowed';
            } else {
                nameInput.disabled = false;
                nameInput.style.cursor = 'auto';
            }
        });
    </script>
@endsection
