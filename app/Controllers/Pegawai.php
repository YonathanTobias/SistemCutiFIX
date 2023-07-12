<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pegawai extends BaseController
{
    protected $pegawaiModel;
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {

    }

    public function detailpegawai($id = 0)
    {
        $data['title'] = 'Detail Pegawai List';
        //$users = new \Myth\Auth\Models\UserModel();
        //$data['users'] = $users->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('data_pegawai');

        //$builder->select('data_pegawai.id as pegawaiid, nip, nama, nama_divisi');
        //$builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->select('data_pegawai.id as pegawaiid, nip, nama,id_cuti,(12 - count(data_cuti.id_cuti)) as cuti, nama_divisi, tanggal_cuti, alasan_cuti, validasi_hrd, validasi_ketua');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id', 'left');
        $builder->groupBy('data_cuti.id_cuti');
        // $builder->where('data_cuti.tanggal_cuti ', 'BETWEEN', '2022-01-01 AND 2022-12-31');
        $builder->where('data_pegawai.id', $id);
        $query = $builder->get();

        $data['data_pegawai'] = $query->getResult();

        // // var_dump($data);
        // if (empty($data['pegawai'])) {
        //     return redirect()->to('admin/pegawailist');
        // }

        return view('admin/detailPegawai', $data);
    }

    public function tambahPegawai()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(
            ['nip' => 'required']
        );
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->pegawaiModel->save([
                'nip' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'id_divisi' => $this->request->getVar('divisi'),
            ]);

            session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
            return redirect('admin/pegawailist');
        }
        $db = \Config\Database::connect();
        $builder1 = $db->table('divisi');

        $builder1->select('*');
        $query = $builder1->get();

        $data['divisi'] = $query->getResult();

        return view('admin/tambahPegawai', $data);
    }
    public function editPegawai($id)
    {
        $data['data_pegawai'] = $this->pegawaiModel->where('id', $id)->first();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nip' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->pegawaiModel->update($id, [
                'nip' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'id_divisi' => $this->request->getVar('divisi'),
                'cuti' => $this->request->getVar('cuti'),
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect('admin/pegawailist');
        }
        $db = \Config\Database::connect();
        $builder1 = $db->table('divisi');

        $builder1->select('*');
        $query = $builder1->get();

        $data['divisi'] = $query->getResult();
        
        return view('admin/editPegawai', $data);
    }
    public function deletePegawai($id)
    {
        $this->pegawaiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect('admin/pegawailist');
    }

    public function exportpegawai($id = 0){
        
        $tahun = date('Y');
        $db = \Config\Database::connect();
        $builder = $db->table('data_pegawai');

        //$builder->select('data_pegawai.id as pegawaiid, nip, nama, nama_divisi');
        //$builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->select('data_pegawai.id as pegawaiid, nip, nama,id_cuti,(12 - count(data_cuti.id_cuti)) as cuti, nama_divisi, tanggal_cuti, alasan_cuti, validasi_hrd, validasi_ketua');
        $builder->join('divisi', 'divisi.id_divisi = data_pegawai.id_divisi');
        $builder->join('data_cuti', 'data_cuti.id_pegawai = data_pegawai.id', 'left');
        $builder->groupBy('data_cuti.id_cuti');
        // $builder->where('data_cuti.tanggal_cuti ', 'BETWEEN', '2022-01-01 AND 2022-12-31');
        $builder->where('data_pegawai.id', $id);
        $query = $builder->get();
        $data = $query->getResult();
        $namafile = preg_replace("/[^a-zA-Z]/", "", $data[0]->nama);
        $namaresult = substr($namafile,0,12);
        // dd($namaresult);
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'NIP');
            $sheet->setCellValue('A2', 'NAMA');
            $sheet->setCellValue('A3', 'Divisi');
            $sheet->setCellValue('B1', $data[0]->nip);
            $sheet->setCellValue('B2', $data[0]->nama);
            $sheet->setCellValue('B3', $data[0]->nama_divisi);
            $sheet->setCellValue('A5', 'nomor');
            $sheet->setCellValue('B5', 'Tanggal Cuti');
            $sheet->setCellValue('C5', 'Alasan');
    
            $column = 6;
            $nomor=2;
            foreach ($data as $key => $value) {
                $sheet->setCellValue('A' . $column, ($nomor - 1));
                $sheet->setCellValue('B' . $column, $value->tanggal_cuti);
                $sheet->setCellValue('C' . $column, $value->alasan_cuti);
                $nomor++;
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
            header('Content-Disposition: attachment;filename=Daftar_Cuti_'.$namafile.'_'.$tahun.'.xlsx');
            header('Cache-Control: nax-age=0');
            $writer->save('php://output');
            exit();
    }
    // public function exportDataPegawai($id)
    // {
    //   
    // }
}
