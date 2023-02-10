@extends('layouts.layout')

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
                        <h3>Tambah Karyawan</h3>
                        <p class="text-subtitle text-muted">
                            Tambah karyawan pada form berikut, dan isi dengan data yang benar!
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Karyawan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- // Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="/store-karyawan" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- ! Form Data Diri --}}
                                        <div class="row mb-5">
                                            <h4 class="card-title mb-3">Data Diri</h4>
                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-light-danger alert-dismissible show fade">
                                                        {{ $error }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="d-flex mb-3">
                                                <i class="text-danger">*</i> <i class="text-primary"> Field wajib di isi</i>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama-lengkap">Nama Lengkap<i
                                                            class="text-danger">*</i></label>
                                                    <input  type="text" id="nama-lengkap" class="form-control"
                                                        placeholder="Nama Lengkap" name="nama"
                                                        value="{{ old('nama') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama-lengkap">Jenis Kelamin<i
                                                            class="text-danger">*</i></label>
                                                    <select name="jenis_kelamin" id="" class="form-select">
                                                        <option value="laki-laki"
                                                            {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki
                                                            - Laki</option>
                                                        <option value="perempuan"
                                                            {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nik">Nomor Induk Kependudukan<i
                                                            class="text-danger">*</i></label>
                                                    <input   type="text" id="nik" class="form-control"
                                                        placeholder="Nomor Induk Kependudukan" name="nik"
                                                        value="{{ old('nik') }}" maxlength="16"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="npwp">NPWP <i class="text-primary"> ( abaikan jika tidak
                                                            ada )</i></label>
                                                    <input   type="text" id="npwp" class="form-control"
                                                        placeholder="Masukan Nomor NPWP" name="npwp"
                                                        value="{{ old('npwp') }}"  maxlength="20" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email">Email<i class="text-danger">*</i></label>
                                                    <input   type="email" id="email" class="form-control" name="email"
                                                        placeholder="Email" value="{{ old('email') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="no-telp">No Telephone<i class="text-danger">*</i>
                                                    </label>
                                                    <input   type="text" id="no-telp" class="form-control"
                                                        name="telephone" placeholder="No Telephone"
                                                        value="{{ old('telephone') }}" maxlength="13"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="no-wa">No WhatsApp <i class="text-primary">( Opsional
                                                            )</i></label>
                                                    <input   type="text" id="no-wa" class="form-control"
                                                        name="whatsapp" placeholder="No WhatsApp"
                                                        value="{{ old('whatsapp') }}" maxlength="13" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="tanggal-lahir">Tanggal Lahir<i
                                                            class="text-danger">*</i></label>
                                                    <input type="date" id="tanggal-lahir" class="form-control"
                                                        name="tanggal_lahir" placeholder="Tanggal Lahir"
                                                        value="{{ old('tanggal_lahir') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="tempat-lahir">Tempat Lahir<i
                                                            class="text-danger">*</i></label>
                                                    <input   type="text" id="tempat-lahir" class="form-control"
                                                        name="tempat_lahir" placeholder="Tempat Lahir"
                                                        value="{{ old('tempat_lahir') }}" />
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="alamat-lengkap">Alamat Lengkap<i
                                                                class="text-danger">*</i></label>
                                                        <textarea   name="alamat" style="resize: none;"
                                                            placeholder="*Contoh : Jln. Mardjadiwangsa RT 01 RW 02 Desa Karangjati Kec.Tarub Kab.Tegal Jawa Tengah , 52184"
                                                            class="form-control" name="" id="" cols="30" rows="10">{{ old('alamat') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        {{-- ! Form Riwayat Pendidikan --}}
                                        <hr class="mb-5">
                                        <div class="row">
                                            <h4 class="card-title mb-3">Riwayat Pendidikan</h4>
                                            <div class="d-flex mb-3">
                                                <i class="text-danger">*</i> <i class="text-primary"> Field wajib di
                                                    isi</i>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-sm btn-success add-tingkat"><i
                                                        class="bi bi-plus-circle"></i>
                                                    Tambah Pendidikan</button>
                                            </div>
                                            <div class="tingkat">
                                                {{-- <div class="mt-2">
                                                    <div class="col-md-6 col-12">

                                                        <div class="form-group">
                                                            <label for="nama-sekolah">Pilih Tingkat<i
                                                                    class="text-danger">*</i></label>
                                                            <select required name="tingkat[]" id="" class="form-select">
                                                                <option value="Tingkat SD">Tingkat SD</option>
                                                                <option value="Tingkat SMP">Tingkat SMP</option>
                                                                <option value="Tingkat SMK">Tingkat SMK</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="nama-sekolah">Nama Sekolah<i
                                                                    class="text-danger">*</i></label>
                                                            <input required type="text" id="nama-sekolah" class="form-control"
                                                                placeholder="Nama Sekolah" name="nama_sekolah[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="tahun-lulus">Tahun Lulus<i
                                                                    class="text-danger">*</i></label>
                                                            <input required type="date" id="tahun-lulus" class="form-control"
                                                                placeholder="Tahun Lulus" name="tahun_lulus[]" />
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div>


                                        </div>
                                        {{-- ! Form Riwayat Penyakit --}}
                                        <hr class="mb-5">
                                        <div class="row">
                                            <h4 class="card-title mb-3">Riwayat Penyakit <i class="text-primary">( abaikan
                                                    jika tidak ada
                                                    )</i></h4>

                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-sm btn-success add-penyakit"><i
                                                        class="bi bi-plus-circle"></i>
                                                    Tambah Riwayat Penyakit</button>
                                            </div>
                                            <div class="penyakit">
                                                {{-- <div class="mt-2">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="nama-penyakit">Nama Penyakit</label>
                                                            <input type="text" id="nama-penyakit" class="form-control"
                                                                placeholder="Nama Penyakit" name="nama_penyakit[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="sejak">Sejak</label>
                                                            <input type="date" id="sejak" class="form-control"
                                                                name="sejak[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">

                                                        <div class="form-group">
                                                            <label for="menular">Apakah Penyakit Menular?</label>
                                                            <select name="menular[]" id="menular" class="form-select">
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div>


                                        </div>
                                        {{-- ! Form Riwayat Pelatihan --}}
                                        <hr class="mb-5">
                                        <div class="row">
                                            <h4 class="card-title mb-3">Riwayat Pelatihan <i class="text-primary">(
                                                    abaikan jika tidak ada
                                                    )</i></h4>

                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-sm btn-success add-pelatihan"><i
                                                        class="bi bi-plus-circle"></i>
                                                    Tambah Riwayat Pelatihan</button>
                                            </div>
                                            <div class="pelatihan">
                                                {{-- <div class="mt-2">
                                                    <div class="col-md-6 col-12">

                                                        <div class="form-group">
                                                            <label for="nama-pelatihan">Nama Pelatihan</label>
                                                            <input type="text" id="nama-pelatihan"
                                                                class="form-control" placeholder="Nama Pelatihan"
                                                                name="nama_pelatihan[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="tanggal-pelatihan">Tanggal</label>
                                                            <input type="date" id="tanggal-pelatihan"
                                                                class="form-control" placeholder="Tanggal Pelatihan"
                                                                name="tanggal_pelatihan[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="sertifikat">Sertifikat</label>
                                                            <input type="file" id="sertifikat" class="form-control"
                                                                placeholder="Sertifikat" name="sertifikat[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="no-sertifikat">No Sertifikat</label>
                                                            <input type="text" id="no-sertifikat" class="form-control"
                                                                placeholder="No Sertfikkat" name="no_sertifikat[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="tanggal-berlaku">Berlaku Sampai</label>
                                                            <input type="date" id="tanggal-berlaku"
                                                                class="form-control" placeholder="Tanggal Berlaku"
                                                                name="batas_berlaku[]" />
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>


                                        </div>
                                        {{-- ! Form Riwayat Pekerjaan --}}
                                        <hr class="mb-5">
                                        <div class="row">
                                            <h4 class="card-title mb-3">Riwayat Pekerjaan <i class="text-primary">(
                                                    abaikan jika tidak ada
                                                    )</i></h4>

                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-sm btn-success add-pekerjaan"><i
                                                        class="bi bi-plus-circle"></i>
                                                    Tambah Riwayat Pekerjaan</button>
                                            </div>
                                            <div class="pekerjaan">
                                                {{-- <div class="mt-2">
                                                    <div class="col-md-6 col-12">

                                                        <div class="form-group">
                                                            <label for="nama-perusahaan">Nama PT / Perusahaan</label>
                                                            <input type="text" id="nama-perusahaan"
                                                                class="form-control" placeholder="Nama Perusahaan"
                                                                name="nama_perusahaan[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="tanggal-mulai">Mulai</label>
                                                            <input type="date" id="tanggal-mulai" class="form-control"
                                                                placeholder="Tanggal pekerjaan" name="tanggal_mulai[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="tanggal-akhir">Akhir</label>
                                                            <input type="date" id="tanggal-akhir" class="form-control"
                                                                placeholder="Tanggal pekerjaan"
                                                                name="tanggal_selesai[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="jabatan">Posisi / Jabatan</label>
                                                            <input type="text" id="jabatan" class="form-control"
                                                                placeholder="Jabatan" name="jabatan[]" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="gaji">Gaji</label>
                                                            <input type="number" id="gaji" class="form-control"
                                                                placeholder="Masukan Nominal Gaji" name="gaji[]" />
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>


                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Save
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic multiple Column Form section end -->

        </div>


        @include('layouts.partials.footer')
    </div>
@endsection
@push('additional-js')
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script>
        // Untuk Menambahkan Form field Tingkat Pendidikan
        $('.add-tingkat').on('click', function() {
            addTingkat()
        })

        function addTingkat() {
            var tingkat =
                '<div class="mt-5"> <div class="col-md-6 col-12"> <div class="d-flex justify-content-end"> <button id="remove-tingkat" type="button" href="" class="remove btn btn-sm btn-danger"><i class="bi bi-x"></i></button> </div> <div class="form-group"> <label for="nama-sekolah">Pilih Tingkat<i class="text-danger">*</i></label> <select name="tingkat[]" id="" class="form-select" required> <option value="Tingkat SD">Tingkat SD</option> <option value="Tingkat SMP">Tingkat SMP</option> <option value="Tingkat SMK">Tingkat SMK</option> </select> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="nama-sekolah">Nama Sekolah<i class="text-danger">*</i></label> <input type="text" id="nama-sekolah" class="form-control" placeholder="Nama Sekolah" name="nama_sekolah[]" required/> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="tahun-lulus">Tahun Lulus<i class="text-danger">*</i></label> <input type="month" id="tahun-lulus" class="form-control" placeholder="Tahun Lulus" name="tahun_lulus[]" required/> </div> </div> </div>'
            $('.tingkat').append(tingkat)
        }
        $('body').on('click', '#remove-tingkat', function() {
            $(this).parent().parent().parent().remove()
        })

        // Menambahkan Form field Riwayat Penyakit
        $('.add-penyakit').on('click', function() {
            addPenyakit()
        })

        function addPenyakit() {
            var penyakit =
                '<div class="mt-5"> <div class="col-md-6 col-12"> <div class="d-flex justify-content-end"> <button id="remove-penyakit" type="button" href="" class="remove btn btn-sm btn-danger"><i class="bi bi-x"></i></button> </div> <div class="form-group"> <label for="nama-penyakit">Nama Penyakit</label> <input type="text" id="nama-penyakit" class="form-control" placeholder="Nama Penyakit" name="nama_penyakit[]" required/> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="sejak">Sejak</label> <input type="month" id="sejak" class="form-control" name="sejak[]" required/> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="menular">Apakah Penyakit Menular?</label> <select name="menular[]" id="menular" class="form-select" required> <option value="Ya">Ya</option> <option value="Tidak">Tidak</option> </select> </div> </div> </div>'
            $('.penyakit').append(penyakit)
        }
        $('body').on('click', '#remove-penyakit', function() {
            $(this).parent().parent().parent().remove()
        })
        // Menambahkan Form field Riwayat Pelatihan
        $('.add-pelatihan').on('click', function() {
            addPelatihan()
        })

        function addPelatihan() {
            var pelatihan =
                '<div class="mt-5"> <div class="col-md-6 col-12"> <div class="d-flex justify-content-end"> <button id="remove-pelatihan" type="button" href="" class="remove btn btn-sm btn-danger"><i class="bi bi-x"></i></button> </div> <div class="form-group"> <label for="nama-pelatihan">Nama Pelatihan</label> <input required type="text" id="nama-pelatihan" class="form-control" placeholder="Nama Pelatihan" name="nama_pelatihan[]" /> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="tanggal-pelatihan">Tanggal</label> <input required type="month" id="tanggal-pelatihan" class="form-control" placeholder="Tanggal Pelatihan" name="tanggal_pelatihan[]" /> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="sertifikat">Sertifikat</label> <input required accept="image/*,.doc,.pdf,.docx" type="file" id="sertifikat" class="form-control" placeholder="Sertifikat" name="sertifikat[]" /> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="no-sertifikat">No Sertifikat</label> <input required type="text" id="no-sertifikat" class="form-control" placeholder="No Sertfikkat" name="no_sertifikat[]" /> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="tanggal-berlaku">Berlaku Sampai</label> <input required type="month" id="tanggal-berlaku" class="form-control" placeholder="Tanggal Berlaku" name="batas_berlaku[]" /> </div> </div> </div>'
            $('.pelatihan').append(pelatihan)
        }
        $('body').on('click', '#remove-pelatihan', function() {
            $(this).parent().parent().parent().remove()
        })
        // Menambahkan Form field Riwayat Pekerjaan
        $('.add-pekerjaan').on('click', function() {
            addPekerjaan()
        })

        function addPekerjaan() {
            var pekerjaan =
                '<div class="mt-5"> <div class="col-md-6 col-12"> <div class="d-flex justify-content-end"> <button id="remove-pekerjaan" type="button" href="" class="remove btn btn-sm btn-danger"><i class="bi bi-x"></i></button> </div> <div class="form-group"> <label for="nama-perusahaan">Nama PT / Perusahaan</label> <input type="text" id="nama-perusahaan" class="form-control" placeholder="Nama Perusahaan" name="nama_perusahaan[]" required /> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="tanggal-mulai">Mulai</label> <input type="date" id="tanggal-mulai" class="form-control" placeholder="Tanggal pekerjaan" name="tanggal_mulai[]" required /> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="tanggal-akhir">Akhir</label> <input type="date" id="tanggal-akhir" class="form-control" placeholder="Tanggal pekerjaan" name="tanggal_selesai[]" required /> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="jabatan">Posisi / Jabatan</label> <input type="text" id="jabatan" class="form-control" placeholder="Jabatan" name="jabatan[]" required/> </div> </div> <div class="col-md-6 col-12"> <div class="form-group"> <label for="gaji">Gaji</label> <input type="number" id="gaji" class="form-control" placeholder="Masukan Nominal Gaji" name="gaji[]" required/> </div> </div> </div>'
            $('.pekerjaan').append(pekerjaan)
        }
        $('body').on('click', '#remove-pekerjaan', function() {
            $(this).parent().parent().parent().remove()
        })
    </script>
@endpush
