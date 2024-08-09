<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'subject', 'mark', 'user_id'];

    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
