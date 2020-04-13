<?php

class DB{

    private static $factory;



    public static function createInstance($config = null)

    {


        $settings['dbname'] = 'powercloud_website_db_1';

        $settings['dbhost'] = 'localhost';

        $settings['dbuser'] = 'root';

        $settings['dbpass'] = '';



        try{



            $conn = mysqli_connect($settings['dbhost'],  $settings['dbuser'], $settings['dbpass']);

            $dsn = 'mysql:dbname=' . $settings['dbname'] . ';host=' . $settings['dbhost'];

            $pdo = new PDO($dsn, $settings['dbuser'], $settings['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));



            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



            self::$factory[$config] = $pdo;



            return self::$factory[$config];

        }

        catch (PDOException $e) {

            die ('Connection failed: ' . $e->getMessage());

        }

    }

}
