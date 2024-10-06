<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'name',
        'workIn',
        'workOut',
        'breakIn',
        'breakOut',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
