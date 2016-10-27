<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceOfFund extends Model {

    protected $table      = "tblCOM_SourceOfFund";
    protected $primaryKey = "SOF_Name";
    protected $increments = false;
    public $timestamps    = false;

}
