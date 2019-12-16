<?php
/**
 * Class Connexion
 * @package Model
 */
class Model
{
    private $PDOInstance = null;
    /**
     * @var array|mixed
     */
    private $settings = [];
    /**
     * @var PDO
     */
    static $_instance;
    /**
     * test si instance PDO existe
     * @return Model|PDO
     */
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Model();
        }
        return self::$_instance;
    }
    /**
     * Connexion constructor.
     */
    private function __construct()
    {
        //$this->id = uniqid();
        $this->settings = require dirname(__DIR__) . './config/configPDO.php';
        $this->PDOInstance = new PDO($this->settings['DB_TYPE'] . ':host='
            . $this->settings['DB_HOST'] . ';dbname='
            . $this->settings['DB_NAME'], $this->settings['DB_USER'],
            $this->settings['DB_PASS'],$this->settings['DB_OPTION']);
    }

    public function retourneConnexion(){
        return $this->PDOInstance;
    }



}