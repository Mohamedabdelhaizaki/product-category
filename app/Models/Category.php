<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Category extends Model
{
    use HasTranslations;
    protected $table = 'categories';
    protected $translatable = ['name'];
    protected $guarded = ['id'];
    private $sortableColumns = ["name", "created_at"];


    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date("d-m-Y", strtotime($value)),
        );
    }

    function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch(Builder $query, $request)
    {
        if (!isset($request->search["value"])) return $query;

        return $query->orWhere('name->' . app()->getLocale(), 'like', '%' . $request->search['value'] . '%')
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
