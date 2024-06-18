<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issueID',
        'projectName',
        'trackerName',
        'statusName',
        'priorityName',
        'authorName',
        'assigneeName',
        'subject',
        'description',
        'startDate',
        'dueDate',
        'doneRatio',
        'isPrivate',
        'estimatedHours',
        'PIC',
        'actualStartDate',
        'actualEndDate',
        'closedOn',
    ];

    protected $casts = [
        'startDate'=> 'datetime:d-m-Y',
        'dueDate'=> 'datetime:d-m-Y',
        'actualStartDate'=> 'datetime:d-m-Y',
        'actualEndDate'=> 'datetime:d-m-Y',
        'closeOn'=> 'datetime:d-m-Y',
//        'startDate',
//        'dueDate',
//        'actualStartDate',
//        'actualEndDate',
//        'closeOn',
    ];

}
