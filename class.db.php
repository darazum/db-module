<?php
class Db
{
    private static $instance;
    /** @var \PDO */
    private $pdo;
    private $log;

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function connect()
    {
        if (!$this->pdo) {
            $this->pdo = new PDO("mysql:host=mysql;dbname=loftschool", 'loftschool', 'loftschool');
        }

        return $this->pdo;
    }

    public function exec(string $query, array $params = [], string $method = '')
    {
        $this->connect();
        $t = microtime(1);
        $query = $this->pdo->prepare($query);
        $ret = $query->execute($params);
        $t = microtime(1) - $t;

        if (!$ret) {
            if ($query->errorCode()) {
                trigger_error(json_encode($query->errorInfo()));
            }
            return false;
        }

        $this->log[] = [
            'query' => $query,
            'time' => $t,
            'method' => $method
        ];

        return $query->rowCount();
    }

    public function fetchAll(string $query, array $params = [], string $method = '')
    {
        $this->connect();
        $t = microtime(1);
        $query = $this->pdo->prepare($query);
        $ret = $query->execute($params);
        $t = microtime(1) - $t;

        if (!$ret) {
            if ($query->errorCode()) {
                trigger_error(json_encode($query->errorInfo()));
            }
            return false;
        }

        $this->log[] = [
            'query' => $query,
            'time' => $t,
            'method' => $method
        ];

        return $query->fetchAll($this->pdo::FETCH_ASSOC);
    }

    public function fetchOne(string $query, array $params = [], string $method = '')
    {
        $this->connect();
        $t = microtime(1);
        $query = $this->pdo->prepare($query);
        $ret = $query->execute($params);
        $t = microtime(1) - $t;

        if (!$ret) {
            if ($query->errorCode()) {
                trigger_error(json_encode($query->errorInfo()));
            }
            return false;
        }

        $this->log[] = [
            'query' => $query,
            'time' => $t,
            'method' => $method
        ];

        $result = $query->fetchAll($this->pdo::FETCH_ASSOC);
        return reset($result);
    }

    public function lastInsertId()
    {
        $this->connect();
        return $this->pdo->lastInsertId();
    }

    public function getLog()
    {
        return $this->log;
    }

}