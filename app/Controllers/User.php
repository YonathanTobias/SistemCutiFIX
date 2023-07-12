<?php

namespace App\Controllers;

use App\Models\cutiModel;

class User extends BaseController
{
    protected $cutiModel;
    public function __construct()
    {
        $this->cutiModel = new cutiModel();
    }
    public function index()
    {
        return view('user/index');
    }
    public function cutiListUser()
    {
        $data['title'] = 'Cuti List';
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('data_pegawai');

        $builder->select('data_pegawai.id as pegawaiid, nip, nama, nama_divisi, tanggal_cuti, alasan_cuti, validasi_hrd, validasi_ketua, id_cuti');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id');
        $builder->where('data_cuti.validasi_hrd', 'no')->orWhere('data_cuti.validasi_ketua', 'no');
        $query = $builder->get();

        $data['pegawai'] = $query->getResult();

        return view('user/approvedUser', $data);
    }
    public function approved($id)
    {
        $approved = 'yes';
        $this->cutiModel->update($id, [
            'validasi_ketua' => $approved,
        ]);
        session()->setFlashdata('pesan', 'Data Cuti Berhasil Di Setujui');
        return redirect('user/approveduser');

        // $approved = 'yes';
        // $data['data_cuti'] = $this->cutiModel->where('id_cuti', $id)->first();
        // $validation = \Config\Services::validation();
        // $validation->setRules([
        //     'id_cuti' => 'required',
        //     'id_pegawai' => 'required',
        // ]);

        // $isDataValid = $validation->withRequest($this->request)->run();
        // if ($isDataValid) {
        //     $this->cutiModel->update($id, [
        //         'validasi_ketua' => $this->request->getVar($approved),
        //     ]);
        //     session()->setFlashdata('pesan', 'Data Cuti Berhasil Di Setujui');
        //     return redirect('user/approveduser');
        // }
    }
}
