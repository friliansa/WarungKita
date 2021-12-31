<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\DetailPembelianModel;
use App\Models\PenjualanModel;
use App\Models\DetailPenjualanModel;

class Dashboard extends BaseController
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
    public function penjualanMingguan()
    {
        //Menentukan 7 hari terakhir
        $hari = array_fill(0, 7, '');
        for ($x = -6; $x <= 0; $x++) {
            $hari[$x + 6] = date("d M Y", strtotime(" $x days"));
        };

        //Menghitung penjualan perhari
        $total = array_fill(0, 7, 0);
        for ($x = -6; $x <= 0; $x++) {
            $sum = $this->penjualanModel->like('created_at', date("Y-m-d", strtotime("$x days")))->findAll();
            foreach ($sum as $sum) {
                $total[$x + 6] += $sum['total'];
            }
        };

        //Kirim data ke Js
        $data = [
            'hari' => $hari,
            'total' => $total
        ];
        echo json_encode($data);
    }
    public function pembeli()
    {
        //Menentukan 7 Hari terakhir
        $hari = array_fill(0, 7, '');
        for ($x = -6; $x <= 0; $x++) {

            $hari[$x + 6] = date("d M Y", strtotime(" $x days"));
        };

        //Menghitung nilai penjualan 7 hari terakhir
        $total = array_fill(0, 7, 0);
        for ($x = -6; $x <= 0; $x++) {
            $nilai = $this->penjualanModel->like('created_at', date("Y-m-d", strtotime("$x days")))->findAll();
            foreach ($nilai as $h) {
                $total[$x + 6]++;
            }
        }

        //Kirim data ke Js
        $data = [
            'hari' => $hari,
            'total' => $total
        ];
        echo json_encode($data);
    }
    public function barang()
    {
        //mengambil data barang dengan susunan atribut terjual secara menurun
        $barang = $this->barangModel->orderBy('terjual', 'DESC')->findAll();

        //menghitung banyaknya atribut terjual yang memiliki nilai lebih dari 0
        $sum = 0;
        foreach ($barang as $b) {
            if ($b['terjual'] > 0) {
                $sum++;
            }
        }

        /*memeriksa apakah nilai atribut terjual lebih dari 0 ada lebih dari 5 atau tidak, jika iya nilai dari variabel
            yang menyimpan banyaknya nilai atribut terjual lebih dari 0 diubah menjadi 5 , karena kita hanya akan 
            menampilkan 5 penjualan terbanyak
        */
        if ($sum > 5) {
            $sum = 5;
        }

        //mendklarasikan variabel array nama dan terjual sebanyak $sum index
        $nama = array_fill(0, $sum, '');
        $terjual = array_fill(0, $sum, 0);

        //menyimpan nama dan jumlah barang terjual sebanyak $sum 
        for ($i = 0; $i < $sum; $i++) {
            $nama[$i] = $barang[$i]['nama'];
            $terjual[$i] = $barang[$i]['terjual'];
        }

        //menyimpan array nama dan terjual pada array data agar dikirm ke file dashboard.js dengan metode ajax
        $data = [
            'nama' => $nama,
            'terjual' => $terjual
        ];
        echo json_encode($data);
    }

    public function laba()
    {
        //menentukan 7 hari terakhir 
        $hari = array_fill(0, 7, '');
        for ($x = -6; $x <= 0; $x++) {
            $hari[$x + 6] = date("d M Y", strtotime(" $x days"));
        };

        //Menghitung nilai laba 7 hari terakhir
        $laba = array_fill(0, 7, 0);
        for ($x = -6; $x <= 0; $x++) {
            $penjualan = $this->detailpenjualanModel->like('created_at', date("Y-m-d", strtotime("$x days")))->findAll();
            foreach ($penjualan as $cuan) {
                $laba[$x + 6] += $cuan['jumlah'] * ($cuan['jual'] - $cuan['beli']);
            }
        }
        //Kirim data ke Js
        $data = [
            'hari' => $hari,
            'laba' => $laba
        ];
        echo json_encode($data);
    }
}
