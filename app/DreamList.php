<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DreamList extends Model
{
    protected $table = 'dream_list';

    protected $primaryKey = 'id';

    protected $fillable = [
        'items', 'status',
    ];
}
