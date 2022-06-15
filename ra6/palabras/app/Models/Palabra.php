<?php
namespace App\Models;
use App\Models\DBAbstractModel;

class Palabra extends DBAbstractModel {
    // Construcción del modelo Singleton
    private static $instancia;
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no está permitida.', E_USER_ERROR);
    }

    // Campos de la base de datos
    private $id;
    private $palabra;
    private $create_at;
    private $update_at;

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setPalabra($palabra) {
        $this->palabra = $palabra;
    }

    // Getters
    public function getMensaje() {
        return $this->mensaje;
    }

    /**
     * Inserción de la palabra en la base de datos
     */
    public function set() {
        $this->query = "INSERT INTO palabras(palabra) VALUES (:palabra)";
        $this->parametros['palabra'] = $this->palabra;
        $this->getResultsFromQuery();
        $this->mensaje = 'Palabra agregada correctamente';
    }

    /**
     * Recuperación de palabra por ID, clave primaria.
     * Carga los resultados en el array definido en la clase abstracta.
     * 
     * @param int id. Identificador de la entidad.
     * @return datos.
     */
    public function get($id='') {
        $this->query = "SELECT * FROM palabras WHERE id = :id";

        // Cargamos los parámetros
        $this->parametros['id'] = $id;

        // Ejecutamos la consulta
        $this->getResultsFromQuery();

        if(count($this->rows) == 1) {
            // Cargamos la información de la base de datos en la entidad
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->propiedad = $valor;
            }
            $this->mensaje = 'OK.';
        } else {
            $this->mensaje = 'No se encontró.';
        }
        return $this->rows[0] ?? null;
    }

    /**
     * Recuperar todos los registros de la tabla.
     * 
     * @return datos.
     */
    public function getAll() {
        $this->query = "SELECT * FROM palabras";

        // Ejecutamos la consulta que devuelve los registros
        $this->getResultsFromQuery();

        return $this->rows;
    }

    /**
     * Método para traer todas las palabras de la tabla.
     * Carga los resultados en el array definido en la clase abstracta.
     * 
     * @param string filter. Filtro de búsqueda.
     * @return datos.
     */
    public function getPalabrasByFilter($filter) {
        $this->query = "SELECT * FROM palabras WHERE palabra LIKE :filtro";
        $this->parametros['filtro'] = '%' . $filter . '%';

        // Ejecutamos la consulta que devuelve los registros
        $this->getResultsFromQuery();

        return $this->rows;
    }

    /**
     * Últimas palabras introducidas
     * 
     * @return datos.
     */
    public function getUltimasPalabras() {
        $this->query = "SELECT * FROM palabras ORDER BY id DESC LIMIT " . SHPORPAGINA;

        // Ejecutamos la consulta que devuelve los registros
        $this->getResultsFromQuery();

        return $this->rows;
    }

    /**
     * Modificación de la entidad y persistencia en la base de datos.
     */
    public function edit() {
        $fecha = new \DateTime();
        $this->query = "UPDATE palabras SET palabra=:palabra, updated_at=:fecha WHERE id = :id";

        $this->parametros['id'] = $this->id;
        $this->parametros['palabra'] = $this->palabra;
        $this->parametros['fecha'] = date('Y-m-d H:i:s', $fecha->getTimeStamp());

        $this->mensaje = 'Palabra modificada correctamente.';
    }

    /**
     * Eliminar palabra de la base de datos.
     */
    public function delete($id='') {
        $this->query = "DELETE FROM palabras WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->getResultsFromQuery();
        $this->mensaje = 'Palabra eliminada correctamente.';
    }

    // Método constructor
    function __construct() {
        /**
         * Singleton no recomienda parámetros ya que
         * podría dificultar la lectura de las instancias.
         */
    }
}
?>