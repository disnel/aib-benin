<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106053139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu ADD menuparent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9370EBCA86 FOREIGN KEY (menuparent_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_7D053A9370EBCA86 ON menu (menuparent_id)');
        $this->addSql('ALTER TABLE publication ADD publicationparent_id INT DEFAULT NULL, ADD ordre_affichage INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677973DD7A41 FOREIGN KEY (publicationparent_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_AF3C677973DD7A41 ON publication (publicationparent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677973DD7A41');
        $this->addSql('DROP INDEX IDX_AF3C677973DD7A41 ON publication');
        $this->addSql('ALTER TABLE publication DROP publicationparent_id, DROP ordre_affichage');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9370EBCA86');
        $this->addSql('DROP INDEX IDX_7D053A9370EBCA86 ON menu');
        $this->addSql('ALTER TABLE menu DROP menuparent_id');
    }
}
