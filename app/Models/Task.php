<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType   = 'uuid';

    protected $fillable = [
        'title',
        'description',
        'completed',
    ];
}
