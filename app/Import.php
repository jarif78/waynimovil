<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public static function getAllEntities()
    {
        return DB::select(DB::raw(
            'SELECT entity_id, sum(debt) AS debt
            FROM imports
            GROUP BY entity_id
            ORDER BY entity_id'
        ));
    }

    public static function getAllDebtors()
    {
        return DB::select(DB::raw(
            'SELECT debtor_id, max(situation) AS situation, sum(debt) AS debt
            FROM imports
            GROUP BY debtor_id
            ORDER BY debtor_id'
        ));
    }
}
