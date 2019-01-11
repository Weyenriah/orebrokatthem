<?php

class PDOWithPrefix extends PDO
{
    protected $_table_prefix;

    public function __construct($dsn, $user = null, $password = null, $driver_options = array(), $prefix = nulll)
    {
        $this->_table_prefix = $prefix;
        parent::__construct($dsn, $user, $password, $driver_options);
    }

    public function exec($statement)
    {
        $statement = $this->_tablePrefix($statement);
        return parent::exec($statement);
    }

    public function prepare($statement, $driver_options = array())
    {
        $statement = $this->_tablePrefix($statement);
        return parent::prepare($statement, $driver_options);
    }

    public function query($statement)
    {
        $statement = $this->_tablePrefix($statement);
        $args      = func_get_args();

        if (count($args) > 1) {
            return call_user_func_array(array($this, 'parent::query'), $args);
        } else {
            return parent::query($statement);
        }
    }

    protected function _tablePrefix($statement)
    {
        return sprintf($statement, $this->_table_prefix);
    }
}