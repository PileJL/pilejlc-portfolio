<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;

#[Guarded(['id'])]
class TechStack extends Model
{
    /** @use HasFactory<\Database\Factories\TechStackFactory> */
    use HasFactory;
}
