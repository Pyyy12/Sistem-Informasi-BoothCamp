<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $fillable = ['user_id','bootcamp_id','status','payment_status','progress','notes'];
    protected $casts = ['progress' => 'integer'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function bootcamp(): BelongsTo { return $this->belongsTo(Bootcamp::class); }
}
