<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180708150241 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DELETE FROM partners');
        $this->addSql('ALTER TABLE partners DROP deleted_at, DROP deleted_by, CHANGE name name VARCHAR(70) NOT NULL, CHANGE slug slug VARCHAR(40) NOT NULL, CHANGE image image VARCHAR(100) DEFAULT NULL, CHANGE type type VARCHAR(40) NOT NULL, CHANGE status status TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE created_by created_by INT NOT NULL');
        $this->addSql('ALTER TABLE partners ADD CONSTRAINT FK_EFEB5164DE12AB56 FOREIGN KEY (created_by) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_EFEB5164DE12AB56 ON partners (created_by)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partners DROP FOREIGN KEY FK_EFEB5164DE12AB56');
        $this->addSql('DROP INDEX IDX_EFEB5164DE12AB56 ON partners');
        $this->addSql('ALTER TABLE partners ADD deleted_at DATETIME DEFAULT NULL, ADD deleted_by DATETIME DEFAULT NULL, CHANGE created_by created_by DATETIME NOT NULL, CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE type type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE status status TINYINT(1) NOT NULL');
    }
}
