<?php
namespace SlaxWeb\Registry;

class Container
{
    /**
     * Dependency Injection Container
     *
     * @var array
     */
    protected static $_dic = [];

    public static function get($class)
    {
        if (isset(self::$_dic[$class]) === false) {
            $params = [];
            if (func_num_args() > 1) {
                $params = func_get_args();
                $params = array_splice($params, 1);
            }
            self::$_dic[$class] = new $class(...$params);
        }

        return self::$_dic[$class];
    }

    public static function setAlias($alias, $class)
    {
        if (isset(self::$_dic[$alias]) === false) {
            $params = [];
            if (func_num_args() > 2) {
                $params = func_get_args();
                $params = array_splice($params, 2);
            }
            self::$_dic[$alias] = new $class(...$params);
        }

        return self::$_dic[$alias];
    }

    public static function addAlias($alias, $object)
    {
        self::$_dic[$alias] = $object;
    }
}
