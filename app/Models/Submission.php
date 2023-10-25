<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'reviewer_id',
        'registrasi_id',
        'title',
        'abstract',
        'keyword',
        'author',
        'topic',
        'abstract_file',
        'rev_abstract_file',
        'paper',
        'rev_paper',
        'ppt',
        'status',
        'message',
        'comment',
        'histories',
        'loa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function persentation()
    {
        return $this->belongsTo(Persentation::class);
    }
}
