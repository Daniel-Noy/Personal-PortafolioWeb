<?php

namespace Models;

use Models\ActiveRecord;

class Category extends ActiveRecord {
    protected static $table = 'categories';
    protected static $dbCol = ['id','name'];

    public $id;
    public $name;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
    }
}