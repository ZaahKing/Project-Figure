<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $guarded = [];
    public const validationMap = ['name' => 'required|max:191'];
}
