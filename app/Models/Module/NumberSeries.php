<?php

namespace App\Models\Module;

use App\Models\Administration\ApprovalSetup;
use App\Models\SGModel;

class NumberSeries extends SGModel {

    const TABLE = 'tblCOM_NoSeries';

    protected $primaryKey = "NS_Id";
    protected $table      = self::TABLE;
    protected $fillable   = [
        'NS_Id',
        'NS_Description',
        'NS_FK_Module_id',
        'NS_StartNo',
        'NS_EndingNo',
        'NS_Location',
    ];

    public function scopeDatatable($query) {

        $columns = [
            'NS_Id',
            'NS_Description',
            'NS_FK_Module_id',
            'M_Description',
            'NS_StartNo',
            'NS_EndingNo',
            'NS_Location',
            'SP_StoreName',
            'NS_LastNoUsed',
            'NS_LastDateUsed'
        ];

        return $query
                        ->select($columns)
                        ->join(Module::TABLE, 'NS_FK_Module_id', '=', 'M_Module_id')
                        ->join('tblINV_StoreProfile', 'NS_Location', '=', 'SP_StoreID')
                        ->orderBy('NS_Id')
        ;
    }

    // <editor-fold defaultstate="collapsed" desc="Relationships">

    public function module() {
        return $this->belongsTo(Module::class, 'NS_FK_Module_id');
    }

    public function approvalSetup() {
        return $this->hasMany(ApprovalSetup::class, 'AS_FK_NS_Id', 'NS_Id');
    }

    // </editor-fold>
}
