<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190424133939 extends AbstractMigration
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
        $this->addSql('ALTER TABLE species ADD queen_size_min INT DEFAULT NULL, ADD workers_size_min INT NOT NULL, ADD queen_size_max INT DEFAULT NULL, ADD workers_size_max INT DEFAULT NULL, DROP queen_size, DROP workers_size, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE breeding_sheet CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE species ADD queen_size VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, ADD workers_size VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP queen_size_min, DROP workers_size_min, DROP queen_size_max, DROP workers_size_max, CHANGE image image VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
