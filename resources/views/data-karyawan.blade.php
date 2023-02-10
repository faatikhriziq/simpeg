@extends('layouts.layout')
@push('additional-head')
    <link rel="stylesheet" href="assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/pages/datatables.css">
    <link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css">
    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css">
    <style>
        th,
        td {
            white-space: nowrap;
        }

        kbd {
            background-color: #eee;
            border-radius: 3px;
            border: 1px solid #b4b4b4;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2), 0 2px 0 0 rgba(255, 255, 255, 0.7) inset;
            color: #333;
            display: inline-block;
            font-size: 0.85em;
            font-weight: 700;
            line-height: 1;
            padding: 2px 4px;
            white-space: nowrap;
        }
    </style>
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
                        <h3>Data Karyawan</h3>
                        <p class="text-subtitle text-muted">
                            Berikut data karyawan yang telah di daftarkan
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data Karyawan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header"><i class="mb-5">Gunakan <kbd>Shift</kbd> + <kbd>Mouse Scroll</kbd> untuk
                            horizontal scroll table</i> </div>
                    <div class="card-body">

                        <table class="table" id="tableKaryawan" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>NPWP</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = 1;
                                    $date = '2023-12-03';
                                @endphp
                                @foreach ($dataKaryawan as $karyawan)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $karyawan->nama }}</td>
                                        <td>{{ $karyawan->nik }}</td>
                                        <td>{{ date_format(date_create($karyawan->tanggal_lahir), 'd F Y') }}</td>
                                        <td>{{ $karyawan->tempat_lahir }}</td>
                                        <td>{{ $karyawan->npwp }}</td>
                                        <td>{{ $karyawan->email }}</td>
                                        <td>{{ $karyawan->telephone }}</td>
                                        <td>{{ $karyawan->jenis_kelamin }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a class="btn badge bg-success text-white" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="edit"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                            <div class="sizedbox" style="width: 7px"></div>
                                            <a class="btn badge bg-info text-white" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="lihat detail"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                            <div class="sizedbox" style="width: 7px"></div>
                                            <form action="/delete-karyawan/{{ $karyawan->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="show_confirm btn badge bg-danger text-white inline-block"><i
                                                        class=" text-white bi bi-trash-fill" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="hapus"></i></button>
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
    <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
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

        $(document).ready(function() {
            $('#tableKaryawan').DataTable({
                scrollX: true,
            });
        });


        // SweetAlert Cofirmation Delete
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result) {
                    form.submit();
                }
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush
