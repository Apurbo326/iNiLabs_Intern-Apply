<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = ['title', 'description'];  // Add the necessary fields here
}
