<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'value',
    ];

    public function getSearchProductsIndex(string $search = '') {
        $product = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();

        return $product;
    }
}
