<?php

namespace Model;

class Usuario extends ActiveRecord{
    // Base de datos
    protected static $table = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido','email','telefono','admin','confirmado','token','password'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    // Mensajes de cración para la validación de una cuenta
    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre es obligatorio.';
        }

        if(!$this->apellido){
            self::$alertas['error'][] = 'El Apellido es obligatorio.';
        }

        if(!$this->email){
            self::$alertas['error'][] = 'El Email es obligatorio.';
        }

        if(!$this->password){
            self::$alertas['error'][] = 'El Password es obligatorio.';
        }

        if(strlen($this->password)<6){
            self::$alertas['error'][] = 'El password debe tener al menos 6 caracteres.';
        }


        return self::$alertas;
    }

    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$table . " WHERE email = '" . $this -> email. "' LIMIT 1";
        
        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][] = 'El usuario ya esta registrado.';
        }

        return $resultado;
    }

    public function hashPassword(){
        $this -> password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this -> token = uniqid();
    }  

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es obligatorio.';
        }

        if(!$this->password){
            self::$alertas['error'][] = 'El Password es obligatorio';
        }

        return self::$alertas;
    }

    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password,$this->password);

        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][]='Password incorrecto o tu cuenta no esta confirmada';
        }else{
            return true;
        }

    }

    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es obligatorio.';
        }

        return self::$alertas;
    }

    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][] = 'El Password es obligatorio.';
        }

        if(strlen($this->password<6)){
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres.';
        }

        return self::$alertas;
    }


}