<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];
    protected $fillable = ['nama', 'kelas_id', 'ipk', 'foto']; // Hapus 'npm' dari sini

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function getUser($id = null) {
        if ($id != null) {
            return $this->join('kelas', 'user.kelas_id', '=', 'kelas.id')
                        ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                        ->where('user.id', $id)
                        ->first();
        }
        
        return $this->join('kelas', 'user.kelas_id', '=', 'kelas.id')
                    ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                    ->get();
    }
}
