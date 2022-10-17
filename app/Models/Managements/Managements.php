<?php

namespace App\Models\Managements;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Managements\Divisi;
use App\Models\Managements\Direktur;
use App\Models\Managements\Departement;
use App\Models\User;

class Managements extends Model
{
    use HasFactory;

    protected $table = 'managements';

    protected $fillable = [
        'direktur_id', 'departement_id', 'divisi_id', 'user_id', 'position', 'jobdesc', 'level'
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function direktur()
    {
        return $this->belongsTo(Direktur::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
