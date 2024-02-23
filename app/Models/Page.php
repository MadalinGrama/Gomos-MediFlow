<?php

namespace App\Models;

use App\Events\PageDeletedEvent;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content',
        'template',
    ];
    protected static $recordEvents = ['created', 'updated'];

    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly(['name'])->setDescriptionForEvent(fn (string $eventName) => "Page {$eventName}");
    }
}
