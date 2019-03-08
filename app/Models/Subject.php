<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];
    public const validationMap = ['name' => 'required|max:32', 'description' => 'max:191'];

    public function decks()
    {
        return $this->hasMany(\App\Models\Deck::class);
    }
}
