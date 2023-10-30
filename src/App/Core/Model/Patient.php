<?php

namespace App\Core\Model;

use Framework\Model\Model;
use Framework\DB\Table\Table;

class Patient extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public static function init():void {
        self::$table = new Table("patients", ["name", "age", "weight", "height", "created_at", "updated_at"]);
    }
}

Patient::init();