@extends('layouts.layout')
@push('additional-head')
    <link rel="stylesheet" href="assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/pages/datatables.css">
    <link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css">
@endpush

@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data Admin</h3>
                        <p class="text-subtitle text-muted">
                            Berikut data admin yang telah di daftarkan
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data Admin
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">Data Admin</div>
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Foto</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($dataUser as $user)

                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><div class="avatar avatar-xl">

                                        @if($user->foto == null)
                                        <img src="/assets/images/pp.png" class="img-thumbnail">
                                        @else
                                        <img src="/storage/{{ $user->foto }}" class="img-thumbnail">
                                        @endif
                                    </div></td>

                                    <td class="d-flex" >
                                        <a class="btn badge bg-success text-white"><i class="bi bi-pencil-fill text-white"></i></a>
                                        <div class="sizedbox" style="width: 15px"></div>
                                        <form action="/delete-user/{{ $user->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn badge bg-danger text-white"><i class=" text-white bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Basic Tables end -->
        </div>

        @include('layouts.partials.footer')
    </div>
@endsection

@push('additional-js')
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="assets/js/pages/datatables.js"></script>
    <script src="assets/extensions/toastify-js/src/toastify.js"></script>
    <script>
        // Membuat Notifikasi User berhasil ditambahkan
         @if (Session::has('success'))
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        @endif

    </script>
@endpush
