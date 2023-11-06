<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106051445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, publication_id INT DEFAULT NULL, nom_image VARCHAR(255) NOT NULL, taille VARCHAR(255) DEFAULT NULL, extension VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, updated DATETIME DEFAULT NULL, deleted DATETIME DEFAULT NULL, INDEX IDX_6A2CA10C38B217A7 (publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, sous_titre VARCHAR(255) DEFAULT NULL, icone VARCHAR(255) DEFAULT NULL, niveau VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, est_masque TINYINT(1) NOT NULL, ordre_affichage INT DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, updated DATETIME DEFAULT NULL, deleted DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, sous_titre VARCHAR(255) DEFAULT NULL, ssous_titre VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, nom_image VARCHAR(255) DEFAULT NULL, nom_document VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, est_slide TINYINT(1) NOT NULL, est_article TINYINT(1) NOT NULL, est_masque TINYINT(1) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, updated DATETIME DEFAULT NULL, deleted DATETIME DEFAULT NULL, INDEX IDX_AF3C6779CCD7E912 (menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C38B217A7');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779CCD7E912');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
