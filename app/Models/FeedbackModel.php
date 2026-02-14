<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    // Nama tabel yang tadi kita buat di phpMyAdmin
    protected $table = 'tbl_feedback'; 
    
    // Primary key dari tabel tersebut
    protected $primaryKey = 'id_feedback'; 

    // Kolom-kolom yang boleh diisi (mass assignment)
    protected $allowedFields = ['nama', 'email', 'subjek', 'pesan', 'tanggal']; 

    // Mengatur agar return datanya berupa Array (sesuai gaya codinganmu yang lain)
    protected $returnType = 'array';
}           