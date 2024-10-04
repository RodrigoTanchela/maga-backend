<?php

namespace App\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        // Criação de uma configuração simples do Doctrine ORM para Atributos
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/..'], // Caminho para suas entidades
            isDevMode: true
    );

        $dotenv = Dotenv::createUnsafeImmutable(__DIR__.'../../..');
        $dotenv->load();

    // Configurando a conexão com o banco de dados PostgreSQL
        $connectionParams = [
            'dbname' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'host' => getenv('DB_HOST'),
            'port'     => '5432', 
            'driver' => getenv('DB_DRIVER'),
            
        ];

        $connection = DriverManager::getConnection($connectionParams, $config);

        // Obtendo o EntityManager
        $entityManager = new EntityManager($connection, $config);
        return $entityManager;
    }
    
}