<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'timeID',
        'projectName',
        'issueID',
        'user',
        'activity',
        'hours',
        'comments',
        'spentOn',
        'createdOn',
        'updatedOn',
        'tcH',
        'tcM',
        'tcL',
        'tcP',
        'tcF',
        'tcPen',
        'tcU',
    ];

    protected $casts = [
        'createdOn' => 'datetime:d-m-Y',
        'updateOn' => 'datetime:d-m-Y',
    ];
}
