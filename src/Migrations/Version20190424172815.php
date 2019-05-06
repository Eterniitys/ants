<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190424172815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE breeding_sheet CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE species ADD petiol_double INT DEFAULT NULL, ADD cocon INT DEFAULT NULL, ADD insertion_centrale INT DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE queen_size_min queen_size_min INT DEFAULT NULL, CHANGE queen_size_max queen_size_max INT DEFAULT NULL, CHANGE workers_size_max workers_size_max INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE breeding_sheet CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE species DROP petiol_double, DROP cocon, DROP insertion_centrale, CHANGE image image VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE queen_size_min queen_size_min INT DEFAULT NULL, CHANGE queen_size_max queen_size_max INT DEFAULT NULL, CHANGE workers_size_max workers_size_max INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
