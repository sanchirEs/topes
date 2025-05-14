<?php
// app/Models/ProductQuestion.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductQuestion extends Model
{
    protected $fillable = [
        'product_id', 'asker_name', 'question_text', 
        'answer_text', 'answered_by', 'status'
    ];

    public $timestamps = true;

    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime',
        'answered_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
