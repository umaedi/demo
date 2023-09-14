<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persentation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'submission_id', 'registrasi_id', 'persentation', 'paper'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submission()
    {
        return $this->hasMany(Submission::class);
    }
}
