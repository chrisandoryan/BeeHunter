<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class BountyCategory extends Model
{
    //
    protected $table, $primaryKey;

    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.bounty.category.name');
        $this->primaryKey = Config::get('constants.tables.bounty.category.primary_key');
    }

    public $timestamps = false;

    public function headerBounties() {
        return $this->hasMany(HeaderBounty::class, 'category_id');
    }
}
