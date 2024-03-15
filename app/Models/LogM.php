<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

use Spatie\Activitylog\LogOptions;

class LogM extends Model
{
    use HasFactory;

    protected $table = "log";
    protected $fillable = ["id", "id_user", "activity"];

    // Define the relationship with the User model
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');
    // }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['id_user', 'activity']);
    }
}
