<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'data_pegawai';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'nip', 'nama', 'id_divisi', 'cuti'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getCuti()
    {
        $builder = $this->db->table('data_pegawai');

        $builder->select('data_pegawai.id as pegawaiid, nip, nama, nama_divisi, tanggal_cuti, alasan_cuti, validasi_hrd, validasi_ketua');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id');
        $query = $builder->get();

        return $query;
    }

    public function getPegawai(){
        $builder = $this->db->table('data_pegawai');
        $builder->select('`data_pegawai`.`id` as `pegawaiid`, `nip`, `nama`, `nama_divisi`,(cuti - count(data_cuti.id_cuti)) as cuti');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id', 'left');
        $builder->groupBy('data_pegawai.id');
        $query = $builder->get();
        
    }
}
