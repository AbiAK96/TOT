<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Question
 * @package App\Models
 * @version April 8, 2022, 2:44 am UTC
 *
 * @property \App\Models\QuestionType $questionType
 * @property integer $question_type_id
 * @property string $question
 * @property string $answer_one
 * @property string $answer_two
 * @property string $answer_three
 * @property string $answer_four
 * @property integer $correct_answer
 */
class SelectedQuestion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'selected_questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'question_id',
        'question_type_id',
        'question',
        'answer_one',
        'answer_two',
        'answer_three',
        'answer_four',
        'correct_answer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'question_id' => 'integer',
        'question_type_id' => 'integer',
        'question' => 'string',
        'answer_one' => 'string',
        'answer_two' => 'string',
        'answer_three' => 'string',
        'answer_four' => 'string',
        'correct_answer' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question_id' => 'required',
        'question_type_id' => 'required',
        'question' => 'required|string|max:255',
        'answer_one' => 'required|string|max:255',
        'answer_two' => 'required|string|max:255',
        'answer_three' => 'required|string|max:255',
        'answer_four' => 'required|string|max:255',
        'correct_answer' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function questionType()
    {
        return $this->belongsTo(\App\Models\QuestionType::class, 'question_type_id');
    }
}
