<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\DetailPembelianModel;
use App\Models\PenjualanModel;
use App\Models\DetailPenjualanModel;

class Barang extends BaseController
{
    protected $barangModel;
    protected $pembelianModel;
    protected $detailpembelianModel;
    protected $penjualanModel;
    protected $detailpenjualanModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->pembelianModel = new PembelianModel();
        $this->detailpembelianModel = new DetailPembelianModel();
        $this->penjualanModel = new PenjualanModel();
        $this->detailpenjualanModel = new DetailPenjualanModel();
    }
    public function editBarang($status, $id)
    {
        $data = [
            'barang' => $this->barangModel->find($id),
            'status' => $status
        ];
        return view('barang/v_edit', $data);
    }
    public function saveBarang($status, $id)
    {
        //mengambil data dari form inputan dengan mengambil name dari inputan
        $data = [
            'nama' => $this->request->getVar('nama'),
            'stok' => $this->request->getVar('stok'),
            'beli' => $this->request->getVar('beli'),
            'jual' => $this->request->getVar('jual'),
        ];

        //mengupdate atribut barangModel pada id $id
        $this->barangModel->update($id, $data);

        //membuat percabngan untuk menentukan menampilkan page tersedia atau kosong bedasarkan status dari barang
        if ($status == "tersedia") {
            return redirect()->to(base_url('tersedia'));
        } else {
            return redirect()->to(base_url('kosong'));
        }
    }
    public function tambahBarang()
    {
        return view('barang/v_tambah');
    }
    public function tambahBarangId($id)
    {
        $data = [
            'id' => $id,
        ];
        return view('barang/v_tambahId', $data);
    }
    public function saveTambahBarang()
    {
        //menyimpan data dari form inputan dengan mengambil name dari inputan pada barangModel
        $this->barangModel->save([
            'nama' => $this->request->getVar('nama'),
            'beli' => $this->request->getVar('beli'),
            'jual' => $this->request->getVar('jual')
        ]);

        return redirect()->to(base_url('kosong'));
    }
    public function saveTambahBarangId($id)
    {
        //menyimpan data dari form inputan dengan mengambil name dari inputan pada barangModel
        $this->barangModel->save([
            'nama' => $this->request->getVar('nama'),
            'beli' => $this->request->getVar('beli'),
            'jual' => $this->request->getVar('jual')
        ]);

        //mengambil id barang dengan nilai tertinggi dengan kata lain data terbaru
        $kodeBarang = $this->barangModel->selectMax('id')->findAll();

        $data = [
            'id' => $id, //menyimpan id dari transaksi pembelian
            'newBarang' =>  $this->barangModel->find($kodeBarang[0]['id']) //mengambil atribut barangModel dengan atribut id = $kodeBarang[0]['id']
        ];
        return view('transaksi/pembelian/v_newBarangPembelian', $data);
    }

    public function newBarang($id)
    {
        $data = [
            'pembelian' => $this->pembelianModel->find($id), //mengembalikan atribut pembelianModel yang memiliki id = $id
            'barang' => $this->barangModel->findAll() //mengambalikan seluruh isi dari barangModel
        ];
        return view('transaksi/pembelian/v_tambahBarangPembelian', $data);
    }
    public function delete($id)
    {

        $data = [
            'status' => 0,
        ];
        //mengupdate atribut barangModel pada id $id
        $this->barangModel->update($id, $data);
        return redirect()->to(base_url('kosong'));
    }
}
