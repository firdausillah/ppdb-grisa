<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('error', 'Silahkan Login');
            redirect(base_url("home"));
        }

        $this->load->model('SiswaModel');
        $this->load->model('JurusanModel');
        $this->load->model('PekerjaanModel');
        $this->load->model('PembawaModel');
        $this->load->model('PendidikanModel');
        $this->load->model('PenghasilanModel');
        $this->load->model('TempattinggalModel');
        $this->load->model('TransportasiModel');
        $this->load->model('PersyaratanModel');
        $this->load->model('Persyaratan_siswaModel');
    }

    public function index()
    {
        $siswa = $this->SiswaModel->findBy($this->session->userdata('id'))->row();

        $jurusan = $this->JurusanModel->get()->result();
        $pekerjaan = $this->PekerjaanModel->get()->result();
        $pembawa = $this->PembawaModel->get()->result();
        $pendidikan = $this->PendidikanModel->get()->result();
        $penghasilan = $this->PenghasilanModel->get()->result();
        $tempattinggal = $this->TempattinggalModel->get()->result();
        $transportasi = $this->TransportasiModel->get()->result();
        $persyaratan = $this->PersyaratanModel->get()->result();
        $persyaratan_siswa = $this->Persyaratan_siswaModel->leftJoinPersyaratan($this->session->userdata('id'))->result();
        
        $data = [
            'title' => 'Biodata Siswa',
            'content' => 'siswa/biodata/index',
            'siswa' => $siswa,
            'jurusan' => $jurusan,
            'pekerjaan' => $pekerjaan,
            'pembawa' => $pembawa,
            'pendidikan' => $pendidikan,
            'penghasilan' => $penghasilan,
            'tempattinggal' => $tempattinggal,
            'transportasi' => $transportasi,
            'persyaratan' => $persyaratan,
            'persyaratan_siswa' => $persyaratan_siswa
        ];

        $this->load->view('layout_siswa/base', $data);
    }

    public function savePribadi(){
        
        $data = [
            'kode_pendaftaran'    => $this->input->post('kode_pendaftaran'),
            'password'    => $this->input->post('password'),
            'nama'    => $this->input->post('nama'),
            'jk'        => $this->input->post('jk'),
            'nisn'    => $this->input->post('nisn'),
            'nik_siswa'  => $this->input->post('nik_siswa'),
            'no_kk'  => $this->input->post('no_kk'),
            'tempatlahir_siswa'  => $this->input->post('tempatlahir_siswa'),
            'tgllahir_siswa'        => $this->input->post('tgllahir_siswa'),
            'noakte_lahir'    => $this->input->post('noakte_lahir'),
            'tinggi_badan'    => $this->input->post('tinggi_badan'),
            'berat_badan'      => $this->input->post('berat_badan'),
            'agama'  => $this->input->post('agama'),
            'kewarganegaraan'      => $this->input->post('kewarganegaraan'),
            'alamat_siswa'    => $this->input->post('alamat_siswa'),
            'rt'        => $this->input->post('rt'),
            'nohp'    => $this->input->post('nohp'),
            'rw'        => $this->input->post('rw'),
            'dusun'  => $this->input->post('dusun'),
            'desa'    => $this->input->post('desa'),
            'kec'      => $this->input->post('kec'),
            'kodepos'      => $this->input->post('kodepos'),
            'tempat_tinggal'        => $this->input->post('tempat_tinggal'),
            'moda_transportasi'  => $this->input->post('moda_transportasi'),
            'anak_berapa'      => $this->input->post('anak_berapa'),
            'punya_kip'  => $this->input->post('punya_kip'),
            'sekolah_asal'    => $this->input->post('sekolah_asal'),
            'id_jurusan'        => $this->input->post('id_jurusan')
        ];
        
        if ($this->SiswaModel->update(['id' => $this->session->userdata('id')], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('siswa/biodata?page=pribadi');
    }

    public function saveAyah(){
        
        $data = [
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nik_ayah'  => $this->input->post('nik_ayah'),
            'tgllahir_ayah' => $this->input->post('tgllahir_ayah'),
            'pendidikan_ayah'   => $this->input->post('pendidikan_ayah'),
            'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah'),
            'penghasilan_ayah'  => $this->input->post('penghasilan_ayah')
        ];
        
        if ($this->SiswaModel->update(['id' => $this->session->userdata('id')], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('siswa/biodata?page=ayah');
    }

    public function saveIbu(){
        
        $data = [
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nik_ibu'  => $this->input->post('nik_ibu'),
            'tgllahir_ibu' => $this->input->post('tgllahir_ibu'),
            'pendidikan_ibu'   => $this->input->post('pendidikan_ibu'),
            'pekerjaan_ibu'    => $this->input->post('pekerjaan_ibu'),
            'penghasilan_ibu'  => $this->input->post('penghasilan_ibu')
        ];
        
        if ($this->SiswaModel->update(['id' => $this->session->userdata('id')], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('siswa/biodata?page=ibu');
    }

    public function saveWali(){
        
        $data = [
            'nama_wali' => $this->input->post('nama_wali'),
            'nik_wali'  => $this->input->post('nik_wali'),
            'tgllahir_wali' => $this->input->post('tgllahir_wali'),
            'pendidikan_wali'   => $this->input->post('pendidikan_wali'),
            'pekerjaan_wali'    => $this->input->post('pekerjaan_wali'),
            'penghasilan_wali'  => $this->input->post('penghasilan_wali')
        ];
        
        if ($this->SiswaModel->update(['id' => $this->session->userdata('id')], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('siswa/biodata?page=wali');
    }
}
