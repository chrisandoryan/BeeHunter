<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Config;

class Submission extends Model
{
    //
    protected $table, $primaryKey = null;

    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.bounty.submission.name');
        $this->primaryKey = Config::get('constants.tables.bounty.submission.primary_key');
    }

    public $timestamps = false;

    protected $fillable = [
        'bounty_id', 'hunter_id', 'title', 'description', 'stored_report_path', 'submitted_datetime', 'is_approved_as_bug',
    ];

    public function hunters() {
        return $this->belongsTo(Hunter::class, 'hunter_id');
    }

    public function headerbounties() {
        return $this->belongsTo(HeaderBounty::class, 'bounty_id');
    }

    public function submissionStatuses() {
        return $this->belongsTo(SubmissionStatus::class, 'submission_status');
    }
}
