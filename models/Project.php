<?php

namespace Models;

use Models\ActiveRecord;

class Project extends ActiveRecord {
    protected static $table = 'projects';
    protected static $dbCol = ['id','title', 'description','repo', 'page', 'image'];

    public $id;
    public $title;
    public $description;
    public $repo;
    public $page;
    public $image;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->title = $args['title'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->repo = $args['repo'] ?? '';
        $this->page = $args['page'] ?? '';
        $this->image = $args['image'] ?? '';
    }

    public function validate()
    {
        $properties = get_object_vars($this);
        foreach ($properties as $key => $value) {
            if ($key === 'id') continue;
            if ($value === ''){
                self::$alerts['error'][] = "{$key} Debe tener un valor";
        }
        }

        $this->validateLinks();
        return self::$alerts;
    }

    public function validateLinks() {
        if (!filter_var($this->repo, FILTER_VALIDATE_URL) || !filter_var($this->repo, FILTER_VALIDATE_URL))
        {
            self::$alerts['error'][] = "Ingresa una URL valida";
        } 
    }
}