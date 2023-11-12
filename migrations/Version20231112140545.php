<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231112140545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coordonnee CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE telephone2 telephone2 VARCHAR(255) DEFAULT NULL, CHANGE email2 email2 VARCHAR(255) DEFAULT NULL, CHANGE logo logo VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coordonnee CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE telephone2 telephone2 VARCHAR(255) NOT NULL, CHANGE email2 email2 VARCHAR(255) NOT NULL, CHANGE logo logo VARCHAR(255) NOT NULL');
    }
}
