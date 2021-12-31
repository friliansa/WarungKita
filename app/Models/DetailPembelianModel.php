<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPembelianModel extends Model
{
    protected $table      = 'detail_pembelian';
    protected $allowedFields = ['kode_transaksi', 'kode_barang', 'nama', 'jumlah', 'harga'];
}
