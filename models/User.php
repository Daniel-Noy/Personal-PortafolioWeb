<?php

namespace Models;

use Models\ActiveRecord;

class User extends ActiveRecord {
    protected static $table = 'user';
    protected static $dbCol = ['id','email', 'password','admin'];

    public $id;
    public $email;
    public $password;
    public $admin;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->admin = $args['admin'] ?? 0;
    }

    // Comprobar el password
    public function verifyPassword($password) : bool 
    {
        return password_verify($password, $this->password );
    }
}