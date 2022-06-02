<?php

namespace lightstone\app;

use lightstone\app\Database as Database;

class Migrator
{
    private $table = 'lightstone_migrations';
    private $migrations_path;
    private $database;

    public function  __construct($migrations_path)
    {
        $this->database = new Database();
        $this->migrations_path = $migrations_path;
    }

    public function migrate()
    {
        if(!$this->checkDB())
        {
            echo "No ".$this->table." found. Creating one... \n";
            $this->createTable();
        }

        $migration_files = $this->getMigrationFiles();

        foreach ($migration_files as $migration_file)
        {
            try
            {
                if(!$this->migrationCompleted($migration_file))
                {
                    $migration_content = file_get_contents($this->migrations_path.$migration_file);
                    $this->database->query($migration_content);
                    $this->markMigration($migration_file);
                    echo 'Migration '.$migration_file." completed \n";
                }
            }
            catch(\Exception $e)
            {
                echo 'Error in `'.$migration_file.'`: '.$e->getMessage()."\n";
            }
        }

        echo "\nDone \n";
    }

    private function checkDB()
    {
        $result = $this->database->query('SHOW TABLES LIKE "'.$this->table.'"');
        return $result->fetch_array() != null;
    }

    private function createTable()
    {
        $this->database->query('
            CREATE TABLE IF NOT EXISTS `'.$this->table.'`
            (
                `id` INT PRIMARY KEY AUTO_INCREMENT,
                `name` VARCHAR(150),
                `time` DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ');
    }

    private function getMigrationFiles()
    {
        $files = array_slice(scandir($this->migrations_path), 2);
        $migrations = [];

        foreach ($files as $key => $file)
        {
            if(strpos($file, '.sql') !== false){
                $migrations[] = $file;
            }
        }

        return $migrations;
    }

    private function migrationCompleted($migration_name)
    {
        $result = $this->database->query('SELECT * FROM `'.$this->table.'` WHERE `name`="'.$migration_name.'"');
        return $result->fetch_array() != null;
    }

    private function markMigration($migration_name)
    {
        $this->database->query('INSERT INTO `'.$this->table.'`(`name`) VALUES("'.$migration_name.'")');
    }
}