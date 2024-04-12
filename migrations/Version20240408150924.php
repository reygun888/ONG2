<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408150924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, description LONGTEXT NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, sous_titre1 VARCHAR(255) DEFAULT NULL, sous_titre2 VARCHAR(255) DEFAULT NULL, sous_titre3 VARCHAR(255) DEFAULT NULL, sous_titre4 VARCHAR(255) DEFAULT NULL, sous_titre5 VARCHAR(255) DEFAULT NULL, paragraphe1 LONGTEXT DEFAULT NULL, paragraphe2 LONGTEXT DEFAULT NULL, paragraphe3 LONGTEXT DEFAULT NULL, paragraphe4 LONGTEXT DEFAULT NULL, paragraphe5 LONGTEXT DEFAULT NULL, paragraphe6 LONGTEXT DEFAULT NULL, paragraphe7 LONGTEXT DEFAULT NULL, paragraphe8 LONGTEXT DEFAULT NULL, paragraphe9 LONGTEXT DEFAULT NULL, paragraphe10 LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
    }
}
