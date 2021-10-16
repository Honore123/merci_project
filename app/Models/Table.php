<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Table extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];
    protected static $logUnguarded = true;
}
