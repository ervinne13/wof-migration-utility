<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model {

    protected $table      = "tblCOM_UserAccess";
    protected $primaryKey = "UA_Access_id";
    public $timestamps    = false;

    public function scopeEditAccessOfModule($query, $moduleId) {
        return $query
                        ->where("UA_AccessName", 'Edit')
                        ->where("UA_FK_Module_id", $moduleId)
        ;
    }

}
