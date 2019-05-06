<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190428183048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE breeding_sheet ADD date DATETIME NOT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE species CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE queen_size_min queen_size_min INT DEFAULT NULL, CHANGE queen_size_max queen_size_max INT DEFAULT NULL, CHANGE workers_size_max workers_size_max INT DEFAULT NULL, CHANGE petiol_double petiol_double INT DEFAULT NULL, CHANGE cocon cocon INT DEFAULT NULL, CHANGE insertion_centrale insertion_centrale INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE breeding_sheet DROP date, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE species CHANGE image image VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE queen_size_min queen_size_min INT DEFAULT NULL, CHANGE queen_size_max queen_size_max INT DEFAULT NULL, CHANGE workers_size_max workers_size_max INT DEFAULT NULL, CHANGE petiol_double petiol_double INT DEFAULT NULL, CHANGE cocon cocon INT DEFAULT NULL, CHANGE insertion_centrale insertion_centrale INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
