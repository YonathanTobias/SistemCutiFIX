<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\cutiModel;
use App\Models\PegawaiModel;
use CodeIgniter\Session\Session;

class Cuti extends BaseController
{
    protected $cutiModel;
    protected $pegawaiModel;
    public function __construct()
    {
        $this->cutiModel = new cutiModel();
        $this->pegawaiModel = new PegawaiModel();
    }
    public function tambahCuti($id)
    {
        $data['data_cuti'] = $this->cutiModel->where('id_pegawai', $id)->first();
        $data['data_pegawai'] = $this->pegawaiModel->where('id', $id)->first();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_pegawai' => 'required',
            'tanggal_cuti' => 'required',
        ],);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->cutiModel->save([
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'tanggal_cuti' => $this->request->getVar('tanggal_cuti'),
                'alasan_cuti' => $this->request->getVar('alasan_cuti'),
            ]);

            session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
            return redirect()->to('admin/detailpegawai/' . $id);
        }
        session()->setFlashdata('pesan_gagal', 'Masukan Data Cuti Dengan Benar');
        return view('admin/tambahCuti', $data);
    }

    public function deleteCuti($id)
    {
        $this->cutiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect('admin/cutilist');
    }

    public function deleteCutiDetail($id)
    {
        
        $data = $this->cutiModel->where('id_cuti', $id)->first();
        $url = $data['id_pegawai'];
        $this->cutiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('admin/detailpegawai/'. $url);
    }

}
