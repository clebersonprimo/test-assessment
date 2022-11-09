<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'city',
        'state',
    ];

    public static function search(array $args)
    {
        $companies = DB::table('companies');
        if(!empty($args['city'])) {
            $companies->where('city', 'like', '%' . $args['city'] . '%');
        }
        if(!empty($args['uf'])) {
            $companies->where('state', 'like', '%' . strtoupper($args['uf']) . '%');
        }
        if(!empty($args['name'])) {
            $companies->where('name', 'like', '%' . $args['name'] . '%');
        }

        return $companies->simplePaginate(4);
    }
}
