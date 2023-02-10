<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Pegawai</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    {{-- <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="assets/images/logo/recruitment.png" type="image/png">
    <link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <div class="d-flex">
                            <img src="assets/images/logo/recruitment.png" alt="" srcset=""
                                style="width: 50px;height: 50px;">
                        <div class="sizedbox" style="width: 17px"></div>
                            <h1>SIMPEG </h1>
                        </div>
                        <hr>
                        <span>
                            <h4>Sistem Informasi Kepegawaian</h4>
                        </span>
                    </div>

                    <h2 class="mb-4">Log in</h2>

                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email"
                                class="form-control form-control-xl @error('email')
                        is-invalid
                    @enderror"
                                placeholder="Email" name="email" >
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @if (Session::has('loginFail'))
                                <div class="invalid-feedback">
                                    {{ Session::get('loginFail') }}
                                </div>
                            @endif
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('loginFail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password"
                                class="form-control form-control-xl @error('password')
                            is-invalid
                        @enderror"
                                placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>

                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if (session()->has('loginFail'))
                                <div class="invalid-feedback">
                                    {{ session('loginFail') }}
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    <script src="assets/extensions/toastify-js/src/toastify.js"></script>
    <script>
        // Membuat Notifikasi Data Riwayat Pekerjaan
        @if (Session::has('loginFail'))
            Toastify({
                text: "{{ Session::get('loginFail') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "left",
                backgroundColor: "#EF4747",
            }).showToast();
        @endif
    </script>

</body>

</html>
