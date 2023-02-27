<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;
    protected $table = 'products';
    protected $translatable = ['name', 'description'];
    protected $guarded = ['id'];
    private $sortableColumns = ["name", "created_at"];


    function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date("d-m-Y", strtotime($value)),
        );
    }

    public function scopeSearch(Builder $query, $request)
    {
        if (!isset($request->search["value"])) return $query;

        return $query->orWhere('name->' . app()->getLocale(), 'like', '%' . $request->search['value'] . '%')
            ->orWhereRelation('category', 'name->' . app()->getLocale(), 'like', '%' . $request->search['value'] . '%')
            ->orWhereDate('created_at', 'like', '%' . $request->search["value"] . '%');
    }

    public function scopeSortBy(Builder $query, $request)
    {
        if (!isset($request->sort["column"]) || !isset($request->sort["dir"])) return $query->latest('created_at');

        if (
            !in_array(Str::lower($request->sort["column"]), $this->sortableColumns) ||
            !in_array(Str::lower($request->sort["dir"]), ["asc", "desc"])
        ) {
            return $query->latest('created_at');
        } else {
            return $query->orderBy($request->sort["column"], $request->sort["dir"]);
        }
    }
}
