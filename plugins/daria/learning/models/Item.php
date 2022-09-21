<?php namespace Daria\Learning\Models;

use Model;

/**
 * Item Model
 */
class Item extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'daria_learning_items';

    public static $allowedSortingOptions = array (
        'name desc' => 'Name - desc',
        'name asc' => 'Name - asc'
    );

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function scopeListFrontEnd($query, $options = []){

        extract(array_merge([
            'page' => 1,
            'perPage' => 10,
            'sort' => 'created_at desc',
            'genres' => null,
            'year' => '',
            'names' => null
        ], $options));


        if(!is_array($sort)){
            $sort = [$sort];
        }

        foreach ($sort as $_sort){
            if(in_array($_sort, array_keys(self::$allowedSortingOptions))){
                $parts = explode(' ', $_sort);

                if(count($parts) < 2){
                    array_push($parts, 'desc');
                }

                list($sortField, $sortDirection) = $parts;

                $query->orderBy($sortField, $sortDirection);
            }
        }

        if ($names !== null){
            if (!is_array($names)){
                $names = [$names];
            }
            $query->whereIn('name', $names);
        }

//        if($genres !== null) {
//
//            if(!is_array($genres)){
//                $genres = [$genres];
//            }
//
//            foreach ($genres as $genre){
//                $query->whereHas('genres', function($q) use ($genre){
//                    $q->where('id', '=', $genre);
//                });
//            }

//        }

        $lastPage = $query->paginate($perPage, $page)->lastPage();

        if($lastPage < $page){
            $page = 1;
        }

        if($year){
            $query->where('year', '=', $year);
        }

        return $query->paginate($perPage, $page);
    }

    public function mew()
    {
        return 'Ваше число - ';
    }
}
