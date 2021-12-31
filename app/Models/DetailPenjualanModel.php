<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table      = 'detail_penjualan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_transaksi', 'kode_barang', 'nama', 'jumlah', 'jual', 'beli'];
}
