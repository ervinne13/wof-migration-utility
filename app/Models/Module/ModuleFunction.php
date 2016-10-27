<?php

namespace App\Models\Module;

use App\Models\SGModel;
use App\Models\User\UserFunction;

class ModuleFunction extends SGModel {

    const TABLE = "tblCOM_Function";

    protected $primaryKey = "F_Function_id";
    protected $table      = self::TABLE;
    public $incrementing  = false;
    public $fillable      = [
        "F_Function_id", "F_FunctionName", "F_FK_Module_id", "F_Order_id", "F_Trigger", "F_Inside", "F_Outside"
    ];

    public function scopeModuleId($query, $moduleId) {
        return $query->where('F_FK_Module_id', $moduleId);
    }

    public function scopeUserId($query, $userId) {
        return $query
                        ->rightJoin(UserFunction::TABLE, 'UF_FK_Function_id', '=', 'F_Function_id')
                        ->where('UF_FK_User_id', $userId);
    }

    public function scopeOutside($query) {
        return $query->where("F_Outside", 1);
    }

    public function scopeAccessibleByUser($query, $moduleId, $userId) {

        return $query
                        ->rightJoin(UserFunction::TABLE, 'UF_FK_Function_id', '=', 'F_Function_id')
                        ->where('F_FK_Module_id', $moduleId)
                        ->where('UF_FK_User_id', $userId)

        ;
    }

}
