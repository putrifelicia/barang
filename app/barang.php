<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';

    protected $fillable =   [
                            'namabrg',
                            'harga',
                            'bahan',
                            'jumlahbrg',
                            'merekBrg',
                            'foto'
                        ];
}