@extends('adminlte::master')

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw1.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="{{ asset('/image/logo50kota.png') }}" width="22%" height="22%">
                    <span class="h1 fw-bold mb-0">Manajemen Aset BPKPD</span>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Masuk ke Aplikasi</p>

                    </div>


                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label class="form-label" for="form3Example3">Username</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>



                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Login') }}</button>

                    </div>

                </form>

            </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2025. BPKPD Kab. Lima Puluh Kota
        </div>
        <!-- Copyright -->

        <!-- Right -->

    </div>
</section>
