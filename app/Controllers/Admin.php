<?php

namespace App\Controllers;

use App\Models\cutiModel;
use App\Models\PegawaiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
    protected $cutiModel;
    protected $pegawaiModel;
    public function __construct()
    {
        $this->cutiModel = new cutiModel();
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        return view('admin/index');
    }

    public function userlist()
    {
        $data['title'] = 'User List';
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['users'] = $query->getResult();

        return view('admin/userList', $data);
    }

    public function pegawailist()
    {
        // $data['title'] = 'pegawai List';
        // $data['pegawai'] = $this->pegawaiModel->paginate(2);
        $data = [
            'title' => 'pegawai list',
            // 'pegawai_pagination' => $this->pegawaiModel->paginate(2),
            // 'pegawai_pager' => $this->pegawaiModel->pager,
        ];
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('data_pegawai');

        $builder->select('`data_pegawai`.`id` as `pegawaiid`, `nip`, `nama`, `nama_divisi`,(cuti - count(data_cuti.id_cuti)) as cuti');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id', 'left');
        $builder->groupBy('data_pegawai.id');
        $query = $builder->get();
        $data['pegawai'] = $query->getResult();

        return view('admin/pegawaiList', $data);
    }

    public function cutilist()
    {
        $data['title'] = 'Cuti List';
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('data_pegawai');

        $builder->select('data_pegawai.id as pegawaiid, nip, nama, nama_divisi,id_cuti, tanggal_cuti, alasan_cuti, validasi_hrd, validasi_ketua');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id');
        $builder->where('data_cuti.validasi_hrd', 'no')->orWhere('data_cuti.validasi_ketua', 'no');
        $query = $builder->get();

        $data['pegawai'] = $query->getResult();

        return view('admin/cuti', $data);
    }

    public function daftarcuti()
    {
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('data_pegawai');

        $builder->select('data_pegawai.id as pegawaiid, nip, nama, nama_divisi,id_cuti, tanggal_cuti, alasan_cuti, validasi_hrd, validasi_ketua');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id');
        $query = $builder->get();

        $data = $query->getResult();

        return $data;
    }


    public function detail($id = 0)
    {
        $data['title'] = 'User detail';
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        $builder->select('users.id as userid, username, email, full_name, user_image ,name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }
    // public function delete($id)
    // {
    //     $this->userModel->delete($id);
    //     return redirect()->to('Admin/index');
    // }

    public function approvedHrd($id)
    {
        $approved = 'yes';
        $this->cutiModel->update($id, [
            'validasi_hrd' => $approved,
        ]);
        session()->setFlashdata('pesan', 'Data Cuti Berhasil Disetujui');
        return redirect('admin/cutilist');
    }

    public function export()
    {
        $tahun = date('Y');
        $data_cuti = $this->daftarcuti();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NIP');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Nama Divisi');
        $sheet->setCellValue('E1', 'Tanggal Cuti');
        $sheet->setCellValue('F1', 'Validasi Hrd');
        $sheet->setCellValue('G1', 'Validasi Ketua');

        $column = 2;
        foreach ($data_cuti as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->nip);
            $sheet->setCellValue('C' . $column, $value->nama);
            $sheet->setCellValue('D' . $column, $value->nama_divisi);
            $sheet->setCellValue('E' . $column, $value->tanggal_cuti);
            $sheet->setCellValue('F' . $column, $value->validasi_hrd);
            $sheet->setCellValue('G' . $column, $value->validasi_ketua);
            $column++;
        }

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetmk.sheet');
        header('Content-Disposition: attachment;filename=Daftar_Cuti_'.$tahun.'.xlsx');
        header('Cache-Control: nax-age=0');
        $writer->save('php://output');
        exit();
    }
}
