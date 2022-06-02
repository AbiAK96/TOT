<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\URL;

/**
 * Class Book
 * @package App\Models
 * @version June 2, 2022, 6:27 am UTC
 *
 * @property string $name
 * @property string $description
 * @property string $file
 * @property string $src
 */
class Book extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'books';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'file',
        'src'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'file' => 'string',
        'src' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required',
        'file' => 'required',
        'src' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function getFileAttribute($value)
    {
        return URL::to('/file/')."/".$value; 
    }

    public function getSrcAttribute($value)
    {
        return URL::to('/file/')."/".$value; 
    }

    public function uploadFile($request)
    {   
        $data = $request->all();
        $file_url = 'file'."_".time().".pdf";
        $file = $data['file'];
        $return = $file->move(public_path('/file/'), $file_url);
        //print_r($file_url);die();
        return ($file_url);

    }

    public function uploadSrc($request)
    {   
        $data = $request->all();
        $image_url = 'book'."_".time().".jpg";
        $image = $data['src'];
        $return = $image->move(public_path('/file/'), $image_url);
        return ($image_url);
    }
}
