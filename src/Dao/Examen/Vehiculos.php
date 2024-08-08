<?php

namespace Dao\Vehiculos;

class Vehiculos extends \Dao\Table
{
    public static function createVehiculo(
        $marca,
        $modelo,
        $a_fabricacion,
        $tipo_combustible,
        $kilometraje
    ) {
        $InsSql = "INSERT INTO DatosVehiculos (marca, modelo, a_fabricacion, tipo_combustible, kilometraje)
         value (:marca, :modelo, :a_fabricacion, :tipo_combustible, :kilometraje);";
        $insParams = [
          
            'marca' => $marca,
            'modelo' => $modelo,
            'a_fabricacion' => $a_fabricacion,
            'tipo_combustible' => $tipo_combustible,
            'kilometraje' => $kilometraje

        ];

        return self::executeNonQuery($InsSql, $insParams);
    }

    public static function updateVehiculo(
        $id_vehiculo,
        $marca,
        $modelo,
        $a_fabricacion,
        $tipo_combustible,
        $kilometraje
    ) {
        $UpdSql = "UPDATE DatosVehiculos set marca = :marca, modelo = :modelo, a_fabricacion = :a_fabricacion, tipo_combustible = :tipo_combustible, kilometraje = :kilometraje where id_vehiculo = :id_vehiculo;";
        $updParams = [
            'id_vehiculo' => $id_vehiculo,
            'marca' => $marca,
            'modelo' => $modelo,
            'a_fabricacion' => $a_fabricacion,
            'tipo_combustible' => $tipo_combustible,
            'kilometraje' => $kilometraje
        ];

        return self::executeNonQuery($UpdSql, $updParams);
    }

    public static function deleteVehiculo($id_vehiculo)
    {
        $DelSql = "DELETE from DatosVehiculos where id_vehiculo = :id_vehiculo;";
        $delParams = ['id_vehiculo' => $id_vehiculo];
        return self::executeNonQuery($DelSql, $delParams);
    }

    public static function readAllVehiculos($filter = '')
    {
        $sqlstr = "SELECT * from DatosVehiculos where marca like :filter;";
        $params = array('filter' => '%' . $filter . '%');
        return self::obtenerRegistros($sqlstr, $params);
    }


    public static function readVehiculo($id_vehiculo)
    {
        $sqlstr = "SELECT * from DatosVehiculos where id_vehiculo = :id_vehiculo;";
        $params = array('id_vehiculo' => $id_vehiculo);
        return self::obtenerUnRegistro($sqlstr, $params);
    }
}
