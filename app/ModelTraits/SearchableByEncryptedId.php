<?php

use Illuminate\Support\Facades\DB;

namespace App\ModelTraits;

/**
 * Description of SearchableByEncryptedId
 *
 * @author Ervinne Sodusta
 */
trait SearchableByEncryptedId {

    public function scopeEncryptedId($query, $id) {
        return $query
                        ->select(["*", DB::raw('md5("' . $this->primaryKey . '") AS id')])
                        ->where(DB::raw('md5("' . $this->primaryKey . '")'), $id);
    }

}
