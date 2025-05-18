<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    // 방법 1: $fillable (허용된 필드만 허용)
    protected $fillable = ['name', 'price', 'brand'];
    // 방법 2: $guarded (막을 필드를 지정)
    // protected $guarded = ['is_admin'];
}
