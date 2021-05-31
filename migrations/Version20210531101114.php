<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531101114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8DBF396750');
        $this->addSql('ALTER TABLE house DROP FOREIGN KEY FK_67D5399DBF396750');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE lebien');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT NOT NULL, annee_renovation INT DEFAULT NULL, etage VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, charge INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE house (id INT NOT NULL, exposition VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, annee_construction INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lebien (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, reference INT NOT NULL, prix INT NOT NULL, localisation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, piece INT DEFAULT NULL, chambre INT DEFAULT NULL, surface INT DEFAULT NULL, standing VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, etat_du_bien VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, vue_dubien VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, eau_chaude VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, chauffage VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, style_du_bien VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, niveau VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ascenseur TINYINT(1) DEFAULT NULL, duplex TINYINT(1) DEFAULT NULL, loft TINYINT(1) DEFAULT NULL, dernier_etage TINYINT(1) DEFAULT NULL, avec_piscine TINYINT(1) DEFAULT NULL, balcon TINYINT(1) DEFAULT NULL, garage TINYINT(1) DEFAULT NULL, parking TINYINT(1) DEFAULT NULL, personne_handicapee TINYINT(1) DEFAULT NULL, investissement_locatif TINYINT(1) DEFAULT NULL, visitevirtuelle TINYINT(1) DEFAULT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DBF396750 FOREIGN KEY (id) REFERENCES lebien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399DBF396750 FOREIGN KEY (id) REFERENCES lebien (id) ON DELETE CASCADE');
    }
}
