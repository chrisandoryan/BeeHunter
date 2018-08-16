<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Config;

class SubmissionStatus extends Model
{
    //
    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.bounty.submissionStatus.name');
        $this->primaryKey = Config::get('constants.tables.bounty.submissionStatus.primary_key');
    }

    public function submissions() {
        return $this->hasMany(Submission::class, 'status_id');
    }


}
