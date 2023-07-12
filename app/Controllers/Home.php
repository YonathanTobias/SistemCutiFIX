<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/listpegawai');
    }

    public function login()
    {
        return view('auth/login', [config('auth')]);
    }

    public function listpegawai()
    {
        $data['title'] = 'pegawai List';
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('data_pegawai');

        $builder->select('`data_pegawai`.`id` as `pegawaiid`, `nip`, `nama`, `nama_divisi`,(12 - count(data_cuti.id_cuti)) as cuti');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id', 'left');
        $builder->groupBy('data_pegawai.id');

        $query = $builder->get();
        $data['pegawai'] = $query->getResult();
        return view('home/listpegawai', $data);
    }
}
