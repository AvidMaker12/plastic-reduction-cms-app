<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlasticCalculatorMultipleChoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plastic_calculator_question_id',
        'choice',
        'choice_category',
        'icon',
        'slug',
        'user_id'
    ];

    // --- Allow the views to access table foreign key data. ---
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plastic_calculator_question()
    {
        return $this->belongsTo(PlasticCalculatorQuestion::class, 'plastic_calculator_question_id');
    }

    // Overide Model-Table connection, just in case. //
    //protected $table = 'plastic_calculator_multiple_choices';
}
