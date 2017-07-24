<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Model;

class AttributeDetail extends Model {

    const TABLE = "tblCOM_AttributeDetail";

    protected $primaryKey = ["AD_Code", "AD_FK_Code"];
    protected $table      = self::TABLE;
    public $timestamps    = false;

    public function scopeCode($query, $code) {
        return $query->where("AD_Code", $code);
    }

    public function scopeTypeCode($query, $typeCode) {
        return $query->where("AD_FK_Code", $typeCode);
    }

}
