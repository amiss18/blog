<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190331101347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post CHANGE auteur_id auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) NOT NULL, CHANGE passion passion VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE signature signature VARCHAR(512) NOT NULL, CHANGE actif actif TINYINT(1) NOT NULL, CHANGE mail mail VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post CHANGE auteur_id auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE passion passion VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE description description LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE signature signature VARCHAR(512) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE actif actif TINYINT(1) DEFAULT \'0\', CHANGE mail mail VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
