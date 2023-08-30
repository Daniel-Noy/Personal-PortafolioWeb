<?php
namespace Models;
class ActiveRecord {
    public $id;

    // Base DE DATOS
    protected static $db;
    protected static $table = '';
    protected static $dbCol = [];

    // alerts y Mensajes
    protected static $alerts = [];
    
    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    // Setear un tipo de Alerta
    public static function setAlert($tipo, $mensaje) {
        static::$alerts[$tipo][] = $mensaje;
    }

    // Obtener las alerts
    public static function getAlerts() {
        return static::$alerts;
    }

    // Validación que se hereda en modelos
    public function validate() {
        static::$alerts = [];
        return static::$alerts;
    }

    // Consulta SQL para crear un objeto en Memoria (Active Record)
    public static function querySQL($query) {
        // Consultar la base de datos
        $res = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $res->fetch_assoc()) {
            $array[] = static::createObject($registro);
        }

        // liberar la memoria
        $res->free();

        // retornar los resultados
        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function createObject($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$dbCol as $column) {
            if($column === 'id') continue;
            $atributos[$column] = $this->$column;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sync($args=[]) { 
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Registros - CRUD
    public function save() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->update();
        } else {
            // Creando un nuevo registro
            $resultado = $this->create();
        }
        return $resultado;
    }

    // crea un nuevo registro
    public function create() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // return ['query'=>$query]; // Descomentar si no te funciona la peticion a la base de datos
        // Resultado de la consulta
        $res = self::$db->query($query);
        return [
            'resultado' =>  $res,
            'id' => self::$db->insert_id
        ];
    }

    // Actualizar el registro
    public function update() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$table ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function delete() {
        $query = "DELETE FROM "  . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $res = self::$db->query($query);
        return $res;
    }

    //? Obtener los datos de la base
    // Obtener todos los Registros
    public static function all($orden = 'DESC') {
        $query = "SELECT * FROM " . static::$table . " ORDER BY id {$orden}";
        $res = self::querySQL($query);
        return $res;
    }

    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table  ." WHERE id = {$id}";
        $res = self::querySQL($query);
        return array_shift( $res ) ;
    }

    // Obtener Registros con cierta cantidad
    public static function get($limit) {
        $query = "SELECT * FROM " . static::$table . " ORDER BY id DESC LIMIT {$limit}" ;
        $res = self::querySQL($query);
        return $res ;
    }

    // Obtener los registros ordenados por una columna especifica
    public static function getOrderBy($column, $order = 'DESC') {
        $query = "SELECT * FROM " . static::$table  ." ORDER BY {$column} {$order}";
        $res = self::querySQL($query);
        return $res;
    }

    // Obtener los registros con un limite, ordenados por una columna
    public static function getOrderByLimited($column, $order = 'DESC', $limite) {
        $query = "SELECT * FROM " . static::$table  ." ORDER BY {$column} {$order} LIMIT {$limite}";
        $res = self::querySQL($query);
        return $res;
    }

    // Busca todos los valores de una columna en una tabla
    public static function getAllColumn($column) {
        $query = "SELECT {$column} FROM " . static::$table . " ORDER BY id DESC";
        $res = self::querySQL($query);
        return $res;
    }

    // Busqueda Where con Columna 
    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$table . " WHERE {$columna} = '{$valor}'";
        // debugguing($query);
        $res = self::querySQL($query);
        return array_shift( $res ) ;
    }

    // Busqueda where de varias columnas
    public static function whereArray($arr = []) {
        $query = "SELECT * FROM " . static::$table . " WHERE ";
        foreach ($arr as $key => $value) {
            if ($key === array_key_last($arr)) {
                $query .= "{$key} = '{$value}'";
            } else {
                $query .= "{$key} = '{$value}' AND ";
            }
        }

        $res = self::querySQL($query);
        return $res ;
    }

    // Regresa solo los registros necesarios para la paginacion
    public static function paginar($perPage, $offset) {
        $query = "SELECT * FROM " . static::$table . " ORDER BY id DESC LIMIT {$perPage} OFFSET {$offset}";
        $res = self:: querySQL($query);
        return $res;
    }

    // Conteo del total de registros
    public static function total($column = '', $value = '') {
        $query = "SELECT COUNT(*) FROM " . static::$table;
        if ($column) {
            $query .= " WHERE {$column} = {$value}";
        }

        $res = self::$db->query($query);
        $total = $res->fetch_array();

        return array_shift($total);
    }

    public static function totalArr($arr = []) {
        $query = "SELECT COUNT(*) FROM " . static::$table . " WHERE ";
        foreach ($arr as $key => $value) {
            if ($key === array_key_last($arr)) {
                $query .= "{$key} = '{$value}'";
            } else {
                $query .= "{$key} = '{$value}' AND ";
            }
        }

        $res = self::$db->query($query);
        $total = $res->fetch_array();

        return array_shift($total);
    }
}
