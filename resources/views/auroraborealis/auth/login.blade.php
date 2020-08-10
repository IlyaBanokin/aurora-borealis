@extends(env('THEME').'.layouts.app')

@section('content')
    <div class="inner-page padd">
        <!-- Contact Us Start -->
        <div class="contactus">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Вход</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('auth.login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="login"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>

                                        <div class="col-md-6">
                                            <input id="login" type="text"
                                                   class="form-control @error('login') is-invalid @enderror"
                                                   name="login" value="{{ old('login') }}" required autocomplete="login"
                                                   autofocus>
                                            @error('login')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-sm" type="submit">Вход</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
