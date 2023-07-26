<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'rowNumber',
        'column_id',
    ];

    public static function getDataByColumn($columnId)
    {
        return self::where('column_id', $columnId)->orderBy('rowNumber')->get();
    }
}
