<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use function Termwind\render;
use App\Models\RiwayatPenyakit;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPelatihan;
use App\Models\RiwayatPendidikan;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{


    public function indexData()
    {
        $dataKaryawan = Karyawan::paginate(10);
        return view('data-karyawan',compact('dataKaryawan'));
    }
    public function addData()
    {
        return view('add-karyawan');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($data['tingkat'])) {

            if ($data['tingkat'] > 0) {
                $request->validate([
                    'tingkat' => 'required',
                    'nama_sekolah' => 'required|max:255',
                    'tahun_lulus' => 'required',
                ]);
            }
        }

        if (isset($data['nama_penyakit'])) {


            if ($data['nama_penyakit'] > 0) {
                //  Validasi Form Riwayat Penyakit
                $request->validate([
                    'nama_penyakit' => 'required',
                    'sejak' => 'required',
                    'menular' => 'required',
                ]);
            }
        }
        if (isset($data['nama_pelatihan'])) {

            if ($data['nama_pelatihan'] > 0) {
                //  Validasi Form Riwayat Pelatihan
                $request->validate([
                    'nama_pelatihan' => 'required',
                    'tanggal_pelatihan' => 'required',
                    'sertifikat' => 'required',
                    'no_sertifikat' => 'required',
                    'batas_berlaku' => 'required',
                ]);
            }
        }

        if (isset($data['nama_perusahaan'])) {

            if ($data['nama_perusahaan'] > 0) {
                //  Validasi Form Riwayat Perusahaan
                $request->validate([
                    'nama_perusahaan' => 'required',
                    'tanggal_mulai' => 'required',
                    'tanggal_selesai' => 'required',
                    'jabatan' => 'required',
                    'gaji' => 'required',
                ]);
            }
        }



        //  Validasi Form Data Diri
        $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:25',
            'nik' => 'required|max_digits:16|numeric|unique:karyawans',
            'npwp' => 'required|max:20|unique:karyawans',
            'email' => 'required|email',
            'telephone' => 'required|numeric|max_digits:13',
            'whatsapp' => 'numeric|max_digits:13',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|max:255',
            'alamat' => 'required'
        ]);



        $data = $request->all();
        $karyawan = new Karyawan;
        $karyawan->nama = $data['nama'];
        $karyawan->jenis_kelamin = $data['jenis_kelamin'];
        $karyawan->nik = $data['nik'];
        $karyawan->npwp = $data['npwp'];
        $karyawan->email = $data['email'];
        $karyawan->telephone = $data['telephone'];
        $karyawan->whatsapp = $data['whatsapp'];
        $karyawan->tanggal_lahir = $data['tanggal_lahir'];
        $karyawan->tempat_lahir = $data['tempat_lahir'];
        $karyawan->alamat = $data['alamat'];

        $saveDataKaryawan = $karyawan->save();

        if ($saveDataKaryawan) {
            Session::flash('karyawan', 'Karyawan Berhasil ditambahkan ');
        }






        // $data['nama'][0] != null && $data['tahun_lulus'][0] != null && $data['tingkat'][0] != null
        // Menambahkan data Riwayat Pendidikan sesuai id karyawan
        if (isset($data['tingkat'])) {

            foreach ($data['tingkat'] as $item => $value) {
                $dataPendidikan = array(
                    'karyawan_id' => $karyawan->id,
                    'tingkat' => $data['tingkat'][$item],
                    'nama_sekolah' => $data['nama_sekolah'][$item],
                    'tahun_lulus' => $data['tahun_lulus'][$item],
                );
                $saveDataPendidikan =  RiwayatPendidikan::create($dataPendidikan);
                if ($saveDataPendidikan) {
                    Session::flash('pendidikan', 'Riwayat Pendidikan Berhasil ditambahkan ');
                }
            }
        }

        // Menambahkan data Riwayat Penyakit sesuai id karyawan
        if (isset($data['nama_penyakit'])) {

            foreach ($data['nama_penyakit'] as $item => $value) {
                $dataPenyakit = array(
                    'karyawan_id' => $karyawan->id,
                    'nama_penyakit' => $data['nama_penyakit'][$item],
                    'sejak' => $data['sejak'][$item],
                    'menular' => $data['menular'][$item],
                );
                // Mass Assigtment

                $saveDataPenyakit =  RiwayatPenyakit::create($dataPenyakit);
                if ($saveDataPenyakit) {
                    Session::flash('penyakit', 'Riwayat Penyakit Berhasil ditambahkan ');
                }
            }
        }
        // Menambahkan data Riwayat Pelatihan sesuai id karyawan
        if (isset($data['nama_pelatihan'])) {

            foreach ($data['nama_pelatihan'] as $item => $value) {
                $file = $data['sertifikat'][$item];
                $path = $file->store('sertifikat');
                $dataPelatihan = array(
                    'karyawan_id' => $karyawan->id,
                    'nama_pelatihan' => $data['nama_pelatihan'][$item],
                    'tanggal_pelatihan' => $data['tanggal_pelatihan'][$item],
                    'no_sertifikat' => $data['no_sertifikat'][$item],
                    'sertifikat' => $path,
                    'batas_berlaku' => $data['batas_berlaku'][$item],
                );

                $saveDataPelatihan =  RiwayatPelatihan::create($dataPelatihan);
                if ($saveDataPelatihan) {
                    Session::flash('pelatihan', 'Riwayat Pelatihan Berhasil ditambahkan ');
                }

            }
        }
        // Menambahkan data Riwayat Pelatihan sesuai id karyawan
        if (isset($data['nama_perusahaan'])) {

            foreach ($data['nama_perusahaan'] as $item => $value) {
                $datapekerjaan = array(
                    'karyawan_id' => $karyawan->id,
                    'nama_perusahaan' => $data['nama_perusahaan'][$item],
                    'tanggal_mulai' => $data['tanggal_mulai'][$item],
                    'tanggal_selesai' => $data['tanggal_selesai'][$item],
                    'jabatan' => $data['jabatan'][$item],
                    'gaji' => $data['gaji'][$item],
                );

                $saveDataPekerjaan =  RiwayatPekerjaan::create($datapekerjaan);
                if ($saveDataPekerjaan) {
                    Session::flash('pekerjaan', 'Riwayat Pekerjaan Berhasil ditambahkan ');
                }
            }
        }

        return redirect('/data-karyawan');
    }

    public function delete($id){
        $karyawan = Karyawan::findOrFail($id);

        $deleteKaryawan = $karyawan->delete();

        if($deleteKaryawan){
            Session::flash('success', 'Data Karyawan Berhasil Di Hapus!');
        }

        return redirect('/data-karyawan');

    }
}
