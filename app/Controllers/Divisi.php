<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DivisiModel;

class Divisi extends BaseController
{
    protected $divisiModel;
    public function __construct()
    {
        $this->divisiModel = new DivisiModel();
    }
    public function index()
    {
        $data['title'] = 'Divisi List';
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('divisi');

        $builder->select('*');
        $query = $builder->get();

        $data['divisi'] = $query->getResult();
        return view('admin/divisiList', $data);
    }

    public function tambahDivisi()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(
            ['nama_divisi' => 'required']
        );
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->divisiModel->save([
                'nama_divisi' => $this->request->getVar('nama_divisi'),
            ]);

            session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
            return redirect('admin/divisilist');
        }
        return view('admin/tambahDivisi');
    }
    public function editDivisi($id)
    {
        $namaBaru = $this->request->getVar('nama_divisi');
        $data['divisi'] = $this->divisiModel->where('id_divisi', $id)->first();
        $validation = \Config\Services::validation();
        $validation->setRules([
            // 'id_divisi' => 'required',
            'nama_divisi' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // dd($isDataValid);
        if ($isDataValid) {
            $this->divisiModel->update($id, [
                'nama_divisi' => $namaBaru
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect('admin/divisilist');
        }else{
            session()->setFlashdata('pesan_gagal', 'Edit Data Gagal');
        }
        return view('admin/editDivisi', $data);
    }
    public function deleteDivisi($id)
    {
        $this->divisiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect('admin/divisilist');
    }
}
