<?php

namespace App\Models\contracts;

abstract class BaseModel implements CrudInterface
{
    protected $connection;
    protected $table;
    protected $primaryKey;

    protected $pageSize = 10;
    protected $attibutes = [];

}
