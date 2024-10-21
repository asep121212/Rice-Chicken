<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    
    // Allow mass assignment for all fields by guarding none
    protected $guarded = [];

    /**
     * Define the relationship between Pemasukan and Product.
     * A Pemasukan belongs to one Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
