<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    //
    protected $table, $primaryKey;
    protected $guard = 'client';

    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.client.name');
        $this->primaryKey = Config::get('constants.tables.client.primary_key');
    }

    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'address', 'phone', 'company_description',
    ];

    public function headerBounties() {
        return $this->hasMany(HeaderBounty::class, 'client_id');
    }

    public function RewardTypes() {
        return $this->hasMany(HeaderBounty::class, 'reward_id');
    }

}
