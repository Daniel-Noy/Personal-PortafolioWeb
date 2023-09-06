<?php

namespace Models;

use Models\ActiveRecord;

class Tool extends ActiveRecord {
    protected static $table = 'tools';
    protected static $dbCol = ['id','name', 'category_id', 'icon'];

    public $id;
    public $name;
    public $category_id;
    public $icon;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->category_id = $args['category_id'] ?? 0;
        $this->icon = $args['icon'] ?? '';
    }
}