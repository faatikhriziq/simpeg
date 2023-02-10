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
                        <h3>Data Riwayat</h3>
                        <p class="text-subtitle text-muted">
                            Berikut data riwayat yang telah di input
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data Riwayat
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">Data Riwayat</div>
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Riwayat Pendidikan</th>
                                    <th>Riwayat Penyakit</th>
                                    <th>Riwayat Pelatihan</th>
                                    <th>Riwayat Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($dataKaryawan as $index=>$karyawan)
                                    <tr>

                                        <td>{{ $dataKaryawan->firstItem() + $index }}</td>
                                        <td>{{ $karyawan->nama }}</td>
                                        <td>
                                            @if (count($karyawan->riwayatPendidikan) > 0)
                                                <h6>{{ count($karyawan->riwayatPendidikan)  }} Riwayat </h6>
                                            @else
                                                <i>{{ 'Tidak ada riwayat' }}</i>
                                            @endif
                                        </td>
                                        <td>
                                            @if (count($karyawan->riwayatPenyakit) > 0)
                                                <h6>{{ count($karyawan->riwayatPenyakit)  }} Riwayat </h6>
                                            @else
                                                <i>{{ 'Tidak ada riwayat' }}</i>
                                            @endif
                                        </td>
                                        <td>
                                            @if (count($karyawan->riwayatPelatihan) > 0)
                                                <h6>{{ count($karyawan->riwayatPelatihan)  }} Riwayat </h6>
                                            @else
                                                <i>{{ 'Tidak ada riwayat' }}</i>
                                            @endif
                                        </td>
                                        <td>
                                            @if (count($karyawan->riwayatPekerjaan) > 0)
                                                <h6>{{ count($karyawan->riwayatPekerjaan)  }} Riwayat </h6>
                                            @else
                                                <i>{{ 'Tidak ada riwayat' }}</i>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-around">

                                            <a class="btn badge bg-success text-white" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="edit riwayat"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                            <a class="btn badge bg-info text-white" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="lihat detail"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                            <a class="btn badge bg-primary text-white" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="tambah riwayat"><i class="bi bi-plus-circle-fill"></i></a>

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
        // Membuat Notifikasi Data Riwayat Pekerjaan
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
        @if (Session::has('pekerjaan'))
            Toastify({
                text: "{{ Session::get('pekerjaan') }}",
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        @endif

        // Membuat Notifikasi Data Riwayat Pelatihan
        @if (Session::has('pelatihan'))
            Toastify({
                text: "{{ Session::get('pelatihan') }}",
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        @endif

        // Membuat Notifikasi Data Riwayat Penyakit
        @if (Session::has('penyakit'))
            Toastify({
                text: "{{ Session::get('penyakit') }}",
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        @endif

        // Membuat Notifikasi Data Riwayat Pendidikan
        @if (Session::has('pendidikan'))
            Toastify({
                text: "{{ Session::get('pendidikan') }}",
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        @endif




        // Membuat Notifikasi Data Riwayat Karyawan
        @if (Session::has('karyawan'))
            Toastify({
                text: "{{ Session::get('karyawan') }}",
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        @endif

        // If you want to use tooltips in your project, we suggest initializing them globally
        // instead of a "per-page" level.
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
    </script>
@endpush
