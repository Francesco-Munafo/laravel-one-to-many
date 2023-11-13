<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $datas = ['deleted_at'];

    protected $fillable = ['title', 'description', 'image', 'git_link', 'external_link', 'publication_date', 'type_id', 'slug'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
