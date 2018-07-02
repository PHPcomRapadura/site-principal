<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180701165629 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE users IF EXISTS users');
        $this->addSql('DROP TABLE usuario IF EXISTS usuario');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, roles JSON NOT NULL, avatar VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, session VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, status TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME NOT NULL, deleted_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, senha VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, grupo JSON NOT NULL, avatar VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, sessao VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, status TINYINT(1) DEFAULT NULL, criado_em DATETIME NOT NULL, criado_por INT NOT NULL, atualizado_em DATETIME DEFAULT NULL, removido_em DATETIME DEFAULT NULL, removido_por INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }
}
