<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BeritaModel');
        $this->load->helper('slug');
        $this->load->helper('upload_foto');

        $role = $this->session->userdata('role');

        if ($role != 'superadmin' and $role != 'adminberita') {
            redirect(base_url("auth/login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Berita',
            'berita' => $this->BeritaModel->get()->result(),
            'content' => 'admin/berita/table'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Berita',
            'content' => 'admin/berita/form',
            'cropper' => 'admin/berita/cropper',
            'aspect' => '4/3'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Berita',
            'berita' => $this->BeritaModel->findBy(['id' => $id])->row(),
            'content' => 'admin/berita/form',
            'cropper' => 'admin/berita/cropper',
            'aspect' => '4/3'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save()
    {
        if(!$this->input->post('slug')){
            $slug = slugify($this->input->post('nama'));
        } else{
            $slug = $this->input->post('slug');
        }
        $id = $this->input->post('id');
        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/berita/';
        $foto = $this->input->post('gambar'); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto($file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }

        $data = [
            'slug' => $slug,
            'nama' => $this->input->post('nama'),
            'foto' => $foto,
            'is_active' => 1,
            'keterangan' => $this->input->post('keterangan')
        ];
        
        if (empty($id)) {
            unset($id);
            if ($this->BeritaModel->add($data)){
                $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
                redirect(base_url('admin/Berita'));
            } exit($this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan'));
        } else {
            if ($this->BeritaModel->update(['id' => $id], $data)){
                $this->session->set_flashdata('flash', 'Data berhasil diupdate');
                redirect(base_url('admin/Berita'));
            } exit($this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan'));
        }
    }



    // public function save_foto()
    // {
    //     $this->load->helper('slug');
    //     $id = $_POST['id'];
    //     $nama = $_POST['nama'];
    //     $gambar = $_POST['gambar'];
    //     // Output: 54esmdr0qf
    //     $kode = slugify($nama) . '-' . $id;
    //     // echo $kode; exit();

    //     $folderPath = './uploads/img/berita/';

    //     $foto_parts = explode(";base64,", $_POST['foto']);
    //     $foto_base64 = base64_decode($foto_parts[1]);
    //     if ($gambar) {
    //         $file = $folderPath . $gambar;
    //         $foto = $gambar;
    //     } else {
    //         $file = $folderPath . $kode . '.png';
    //         $foto = $kode . '.png';
    //     }
    //     // echo $foto; exit();

    //     if (!write_file($file,  $foto_base64)) {

    //         echo json_encode(["foto uploaded gagal."]);
    //     } else {
    //         if ($this->BeritaModel->update(['id' => $id], ['foto' => $foto])) {
    //             $this->session->set_flashdata('flash', 'Data berhasil diupdate');
    //         } else {
    //             $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
    //         }
    //         echo json_encode([$foto]);
    //     }
    // }
    // public function update($id)
    // {
    //     $data = [
    //         'kode' => $this->input->post('kode'),
    //         'nama' => $this->input->post('nama'),
    //         'foto' => $this->input->post('foto'),
    //         'keterangan' => $this->input->post('keterangan'),

    //     ];


    //     if ($this->BeritaModel->update(['id' => $id], $data)) {
    //         $this->session->set_flashdata('flash', 'Data berhasil diupdate');
    //     } else {
    //         $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
    //     }

    //     redirect(base_url('admin/Berita'));
    // }

    public function delete($id)
    {
        $data = $this->BeritaModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/berita/' . $data->foto);

        if ($this->BeritaModel->delete(['id' => $id])) {
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('admin/Berita');
    }
}
