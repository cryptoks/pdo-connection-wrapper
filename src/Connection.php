<?php

class Connection
{

    protected $ConnectionConfigs;

    protected $ConnectionOptions = [];

    public function __construct(array $ConnectionConfigs, array $ConnectionOptions)
    {
        $this->ConnectionConfigs = $ConnectionConfigs;
        $this->ConnectionOptions = $ConnectionOptions;
    }


    public function connect()
    {

        try {
            $PDOConnection = new PDO($this->CreateDSN(), $this->ConnectionConfigs['username'], $this->ConnectionConfigs['password'], $this->ConnectionOptions);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $PDOConnection;
    }

    private function CreateDSN()
    {

        $Charset = isset($this->ConnectionConfigs['charset']) ? $this->ConnectionConfigs['charset'] : 'utf8';

        $dsn = sprintf("mysql:host=%s;dbname=%s;charset:%s",
            $this->ConnectionConfigs['host'],
            $this->ConnectionConfigs['database_name'],
            $Charset
        );

        return $dsn;
    }

}