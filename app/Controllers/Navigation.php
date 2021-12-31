<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\DetailPembelianModel;
use App\Models\PenjualanModel;
use App\Models\DetailPenjualanModel;

class Navigation extends BaseController
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
    public function index()
    {
        return redirect()->to(base_url('dashboard'));
    }
    public function dashboard()
    {

        return view('dashboard/v_dash');
    }
    public function pembelian()
    {
        $data = [
            'pembelian' => $this->pembelianModel->where('total !=', 0)->findAll(),
        ];

        return view('transaksi/pembelian/v_pembelian', $data);
    }
    public function penjualan()
    {
        $data = [
            'penjualan' => $this->penjualanModel->where('total >', 0)->findAll(), //mencari atribut penjualanModel dengan nilai total
        ];
        return view('transaksi/penjualan/v_penjualan', $data);
    }
    public function tersedia()
    {
        $data = [
            'barang' => $this->barangModel->where('stok >', 0)->findAll(), //mencari atribut barangModel dengan stok > 0
            'status' => "tersedia"
        ];
        return view('barang/v_tersedia', $data);
    }
    public function kosong()
    {
        $data = [
            'barang' => $this->barangModel->where('status', 1)->where('stok ', 0)->findAll(), //mencari atribut barangModel dengan stok = 0
            'status' => "kosong"
        ];
        return view('barang/v_kosong', $data);
    }
}
