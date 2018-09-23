<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Config;

class Rewardment extends Model
{
    //
    protected $table, $primaryKey;
    public $timestamps = false;

    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.rewardment.name');
        $this->primaryKey = Config::get('constants.tables.rewardment.primary_key');
    }
}
