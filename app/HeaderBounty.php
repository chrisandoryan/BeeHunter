<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Config;

class HeaderBounty extends Model
{
    //
    protected $table, $primaryKey;

    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.bounty.header.name');
        $this->primaryKey = Config::get('constants.tables.bounty.header.primary_key');
    }

    public function clients() {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function bountyCategories() {
        return $this->belongsTo(BountyCategory::class, 'category_id');
    }
}
