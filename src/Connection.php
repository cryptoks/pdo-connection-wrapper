<?php

class Connection
{

    protected $ConnectionConfigs;

    protected $ConnectionOptions = [];

    protected $PDODatabaseDriver = 'mysql';

    public function __construct(array $ConnectionConfigs, array $ConnectionOptions, string $PDODatabaseDriver)
    {
        $this->ConnectionConfigs = $ConnectionConfigs;
        $this->ConnectionOptions = $ConnectionOptions;
        $this->PDODatabaseDriver = $PDODatabaseDriver;
    }

    public function connect(): \PDO
    {

        try {
            $PDOConnection = new PDO($this->CreateDSN($this->PDODatabaseDriver), $this->ConnectionConfigs['username'], $this->ConnectionConfigs['password'], $this->ConnectionOptions);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $PDOConnection;
    }

    private function CreateDSN($PDODatabaseDriver): string
    {

        $Charset = $this->ConnectionConfigs['charset'] ?? 'utf8';
        $PDODriver = !in_array($this->PDODatabaseDriver, $this->SupportedPDODatabaseDrivers()) ? 'mysql' : $this->PDODatabaseDriver;

        $dsn = sprintf("%s:host=%s;dbname=%s;charset:%s",
            $PDODriver,
            $this->ConnectionConfigs['host'],
            $this->ConnectionConfigs['database_name'],
            $Charset
        );

        return $dsn;
    }

    public function SupportedPDODatabaseDrivers(): array
    {
        return [
            'cubrid',
            'dblib',
            'firebird',
            'ibm',
            'informix',
            'mysql',
            'oci',
            'odbc',
            'pgsql',
            'sqlite',
            'sqlsrv'
        ];
    }

}