<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\UserProfile;

/**
 * FIXME: move this to modules namespace
 */
class ModuleAccess extends Model {

    const TABLE = "tblCOM_ModuleAccess";

    protected $primaryKey = "MA_Access_id";
    protected $table      = self::TABLE;
//  disable timestamps
    public $timestamps    = false;
    public $fillable      = [
        "MA_Access_id", "MA_FK_Module_id", "MA_AccessName", "MA_Icon", "MA_Trigger", "MA_Inside", "MA_Outside", "MA_Header", "MA_Inline", "MA_Get"
    ];

    public function userProfile() {
        return $this->belongsTo(UserProfile::class, "UA_FK_Access_id", "MA_Access_id");
    }

    //
    /*     * ************************************************************************* */
    //  <editor-fold defaultstate="collapsed" desc="Scopes">

    public function scopeModuleId($query, $moduleId) {
        return $query->where('MA_FK_Module_id', $moduleId);
    }

    public function scopeUserId($query, $userId) {
        return $query
                        ->join('tblCOM_UserAccess', 'MA_Access_id', '=', 'UA_FK_Access_id')
                        ->where('UA_FK_User_id', $userId);
    }

    public function scopeHeader($query) {
        return $query->where("MA_Header", 1);
    }

    public function scopeNonHeader($query) {
        return $query->whereNull("MA_Header")->orWhere("MA_Header", 0);
    }

    //  </editor-fold>
}
