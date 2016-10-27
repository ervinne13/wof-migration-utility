<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\SGModel;
use App\Models\User\UserAccess;
use App\Models\User\UserFunction;
use App\Models\User\UserProfile;

/**
 * Database specific functions:
 * Postgres 
 *  scopeSelectableByDescription - DISTINCT ON
 *  scopeSelectableByDescription - string concatenation - ||
 */
class Module extends SGModel {

    const TABLE = 'tblCOM_Module';

    /*
     * Note: Edit access can only be applicable to Open documents     
     */

    protected $primaryKey = "M_Module_id";
    protected $table      = self::TABLE;
    public $incrementing  = true;
    //
    //  disable timestamps
    public $timestamps    = false;

    //  disable SG Model Auto Saving 
    public static function boot() {
        Model::boot();
    }

    //
    /*     * ************************************************************************* */
    //  <editor-fold defaultstate="collapsed" desc="Scopes">

    public function scopeAccessibleByUser($query, $userId) {
        return $query
                        ->join(UserAccess::TABLE, 'M_Module_id', '=', 'UA_FK_Module_id')
                        ->where('UA_FK_User_id', $userId)
        ;
    }

    public function scopeHeaders($query) {
        return $query
                        ->where('M_Header', 1)
                        ->where('M_Parent', 0)
                        ->orderBy('M_Module_id')
        ;
    }

    public function scopeActive($query) {
        return $query->where("M_Active", 1);
    }

    public function scopeNonHeader($query) {
        return $query
                        ->where('M_Header', 0)
                        ->where('M_Parent', '!=', 0)
        ;
    }

    //
    /*     * ************************************************************************* */
    //  Unorthodox Scopes

    public function scopeAccessAndFunctions($query) {

        $moduleFunctionFilter = function($query) {
            return $query->select('F_FK_Module_id', 'F_Function_id', 'F_FunctionName');
        };

        $userAccessFilter = function($query) {
            return $query->orderBy('MA_Access_id');
        };

        return $query
                        ->active()
                        ->select(["M_Module_id", "M_Parent", "M_Description", "M_Trigger", "M_Parent", "M_Header"])
                        ->with(['functions' => $moduleFunctionFilter])
                        ->with(['access' => $userAccessFilter])
                        ->orderBy('M_Module_id')
        ;
    }

    //  </editor-fold>

    /*     * ************************************************************************* */
    //  <editor-fold defaultstate="collapsed" desc="Relationships">  

    public function moduleParent() {
        return $this->belongsTo(Module::class, 'M_Parent', 'M_Module_id');
    }

    public function moduleChildren() {
        return $this->hasMany(Module::class, 'M_Parent', 'M_Module_id')->orderBy('M_Module_id');
    }

    public function moduleAccessibleChildren($userId) {
        return $this
                        ->hasMany(Module::class, 'M_Parent', 'M_Module_id')
                        ->join(UserAccess::TABLE, 'M_Module_id', '=', 'UA_FK_Module_id')
                        ->where('UA_FK_User_id', $userId)
                        ->orderBy('M_Module_id');
    }

    public function functions() {
        return $this->hasMany(ModuleFunction::class, 'F_FK_Module_id');
    }

    public function userFunction() {
        return $this->hasMany(UserFunction::class, 'UF_FK_Module_id');
    }

    public function access() {
        return $this->hasMany(ModuleAccess::class, 'MA_FK_Module_id');
    }

    public function numberSeries() {
        return $this->hasMany(NumberSeries::class, 'NS_FK_Module_id');
    }

    //  </editor-fold>
}
