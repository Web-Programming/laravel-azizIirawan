<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    //jika nama table berbeda
    protected $table = "mahasiswas";
    //untuk mengatur kolom yang boleh diisi saat mass insert
    protected $fillable = ['npm','nama','tempat_lahir','tanggal_lahir'];
    //digunakan untuk mengatur kolom yang tidak boleh di isi
    protected $guard =[];
}
