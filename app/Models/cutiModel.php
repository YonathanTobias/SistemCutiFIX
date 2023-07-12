<?php

namespace App\Models;

use CodeIgniter\Model;

class cutiModel extends Model
{
    protected $table = 'data_cuti';
    protected $primaryKey = 'id_cuti';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuti', 'id_pegawai', 'tanggal_cuti', 'alasan_cuti', 'validasi_hrd', 'validasi_ketua'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function getPegawai()
    {
        $query = $this->db->table('data_cuti')
            ->join('data.pegawai', 'data_cuti.id_pegawai = data_pegawai.id')
            ->get();
        return $query;
    }

}
