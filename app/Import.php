<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'imports';

    protected $fillable = [
        'entity_id',
        'date_information',
        'debtor_id',
        'situation',
        'debt',
    ];
}
