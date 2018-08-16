<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Illuminate\Support\Facades\Config;

class Hunter extends Authenticatable
{
    //
    use Notifiable;

    protected $table, $primaryKey;

    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.hunter.name');
        $this->primaryKey = Config::get('constants.tables.hunter.primary_key');
    }

    public $timestamps = false;
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'birthday', 'balance',
    ];

    public function getRankPosition() {
        return $this->newQuery()->where('points', '>=', $this->points)->count();
    }

}
