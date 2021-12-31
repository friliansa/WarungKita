<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\DetailPembelianModel;
use App\Models\PenjualanModel;
use App\Models\DetailPenjualanModel;

class Transaksi extends BaseController
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
    public function detailPembelian($id)
    {
        $data = [
            //mencari atribut pada detailpembelianModel dengan kode_transaksi = $id
            'detail' => $this->detailpembelianModel->where('kode_transaksi', $id)->findAll(),
        ];
        return view('transaksi/pembelian/v_detailPembelian', $data);
    }
    public function tambahPembelian()
    {
        return view('transaksi/pembelian/v_tambahPembelian');
    }

    public function savePembelian()
    {
        //menyimpan nilai dari inputan dengan name nama pada pembelianModel
        $this->pembelianModel->save([
            'nama' => $this->request->getVar('nama'),
        ]);

        //mencari atribut dengan id terbesar untuk menentukan id terbaru
        $id = $this->pembelianModel->selectMax('id')->find();


        $data = [
            'pembelian' => $this->pembelianModel->find($id[0]['id']), //mencari seluruh atribut pembelianModel dengan id terbaru
            'barang' => $this->barangModel->findAll() //mencari seluruh atribut dari  barangModel
        ];
        return view('transaksi/pembelian/v_tambahBarangPembelian', $data);
    }


    public function saveTambahPembelian($id)
    {
        //menyimpan nilai dari form inputan dengan name kode pada variabel kode
        $kode = $this->request->getVar('kode');

        //Menghitung nilai Total baru
        $pembelian = $this->pembelianModel->find($id);
        $total = $pembelian['total'];
        $jumlah = $this->request->getVar('jumlah');
        $beli = $this->request->getVar('beli');
        $total = $total + ($jumlah * $beli);

        //Update Nilai total baru
        $update1 = [
            'total' => $total,
        ];
        $this->pembelianModel->update($id, $update1);

        //Menghitung jumlah stok baru
        $barang = $this->barangModel->find($kode);
        $stok = $barang['stok'];
        $stok += $jumlah;
        $barang = $this->barangModel->find($kode);

        //Update Stok Barang
        $update2 = [
            'stok' => $stok,
            'beli' => $beli,
        ];
        $this->barangModel->update($kode, $update2);

        //Menyimpan belanja pembelian
        $this->detailpembelianModel->save([
            'kode_transaksi' => $id,
            'kode_barang' => $kode,
            'nama' => $barang['nama'],
            'jumlah' => (int)$jumlah,
            'harga' => (int)$beli,
        ]);

        $data = [
            'pembelian' => $this->pembelianModel->find($id), //mencari atribut pada pembelianModel dengan id = $id
            'barang' => $this->barangModel->findAll() //mencari seluruh atribut dari barangModel
        ];
        return view('transaksi/pembelian/v_tambahBarangPembelian', $data);
    }
    public function totalPembelian($id)
    {
        $data = [
            'pembelian' => $this->pembelianModel->find($id), //mencari atribut pada pembelianModel dengan id = $id
        ];
        return view('transaksi/pembelian/v_totalPembelian', $data);
    }
    public function detailPenjualan($id)
    {
        $data = [
            //mencari atribut pada detailpenjualanModel dengan kode_transaksi = $id
            'detail' => $this->detailpenjualanModel->where('kode_transaksi', $id)->findAll(),
        ];
        return view('transaksi/penjualan/v_detailPenjualan', $data);
    }
    public function tambahPenjualan()
    {
        $data = [
            'barang' => $this->barangModel->where('stok >', 0)->findAll() //mencari atribut dari barangModel dimana stok > 0
        ];
        return view('transaksi/penjualan/v_tambahPenjualan', $data);
    }
    public function savePenjualan()
    {
        //menyimpan nilai dari form inputan dengan name nama pada penjualanModel
        $this->penjualanModel->save([
            'nama' => $this->request->getVar('nama'),
        ]);

        //mencari nilai id pada penjualanModel terbaru yaitu id terbesar
        $id = [
            'id' => $this->penjualanModel->selectMax('id')->find(),
        ];

        $data = [
            'penjualan' => $this->penjualanModel->find($id['id'][0]['id']), //mencari atribut dari penjualanModel dengan id terbesar
            'barang' => $this->barangModel->where('stok >', 0)->findAll() //mencari atribut dari barangModel dengan stok > 0
        ];

        return view('transaksi/penjualan/v_tambahBarangPenjualan', $data);
    }
    public function savePenjualan2($id, $kode)
    {
        $data = [
            'penjualan' => $this->penjualanModel->find($id), //mencari atribut penjualanModel dengan id=$id
            'barang' => $this->barangModel->find($kode) //mencari atribut barangModel dengan id=$kode
        ];

        //Menghitung nilai Total baru
        $total = $data['penjualan']['total'];
        $jumlah = $this->request->getVar('jumlah');
        $jual = $data['barang']['jual'];
        $total = $total + ($jumlah * $jual);

        //Update Nilai total baru
        $update1 = [
            'total' => $total,
        ];
        $this->penjualanModel->update($id, $update1);

        //Menghitung jumlah stok baru
        $stok = $data['barang']['stok'];
        $stok -= $jumlah;

        //menjumlahkan jumlah barang terjual
        $sum = $data['barang']['terjual'];
        $sum += $jumlah;

        //Update Stok Barang dan Jumlah terjual
        $update2 = [
            'stok' => $stok,
            'terjual' => $sum,
        ];
        $this->barangModel->update($kode, $update2);

        //Menyimpan penjualan
        $this->detailpenjualanModel->save([
            'kode_transaksi' => $id,
            'kode_barang' => $kode,
            'nama' => $data['barang']['nama'],
            'jumlah' => $jumlah,
            'jual' => $jual,
            'beli' => $data['barang']['beli']
        ]);

        $data = [
            'penjualan' => $this->penjualanModel->find($id), //mecari atribut dari penjualanModel dengan id=$id
            'barang' => $this->barangModel->where('stok >', 0)->findAll(), //mencari seluruh atribut dari barangModel
        ];

        return view('transaksi/penjualan/v_tambahBarangPenjualan', $data);
    }
    public function saveBarangPenjualan($id)
    {
        //menyimpan nilai dari form inputan dengan name = kode pada variabel kode
        $kode = $this->request->getVar('kode');

        $data = [
            'penjualan' => $this->penjualanModel->find($id), //mecari atribut dari penjualanModel dengan id=$id
            'barang' => $this->barangModel->find($kode) //mecari atribut dari barangModel dengan id=$kode
        ];

        return view('transaksi/penjualan/v_tambahJumlahBarangPenjualan', $data);
    }
    public function totalPenjualan($total)
    {
        $data = [
            'total' => $total
        ];
        return view('transaksi/penjualan/v_totalPenjualan', $data);
    }
}
