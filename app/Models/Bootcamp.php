<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bootcamp extends Model
{
    protected $fillable = [
        'category_id','title','slug','excerpt','description','mentor_name',
        'level','duration_weeks','price','thumbnail','is_featured','is_published'
    ];
    protected $casts = ['is_featured' => 'boolean', 'is_published' => 'boolean', 'price' => 'decimal:2'];
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function enrollments(): HasMany { return $this->hasMany(Enrollment::class); }
    public function getRouteKeyName(): string { return 'slug'; }
}
