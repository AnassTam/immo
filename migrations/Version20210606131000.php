<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210606131000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT NOT NULL, annee_renovation INT DEFAULT NULL, etage VARCHAR(255) DEFAULT NULL, charge INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house (id INT NOT NULL, exposition VARCHAR(255) DEFAULT NULL, annee_construction INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lebien (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(255) DEFAULT NULL, reference INT NOT NULL, prix INT NOT NULL, localisation VARCHAR(255) NOT NULL, piece INT DEFAULT NULL, chambre INT DEFAULT NULL, surface INT DEFAULT NULL, standing VARCHAR(255) DEFAULT NULL, etat_du_bien VARCHAR(255) DEFAULT NULL, vue_dubien VARCHAR(255) DEFAULT NULL, eau_chaude VARCHAR(255) DEFAULT NULL, chauffage VARCHAR(255) DEFAULT NULL, style_du_bien VARCHAR(255) DEFAULT NULL, niveau VARCHAR(255) DEFAULT NULL, ascenseur TINYINT(1) DEFAULT NULL, duplex TINYINT(1) DEFAULT NULL, loft TINYINT(1) DEFAULT NULL, dernier_etage TINYINT(1) DEFAULT NULL, avec_piscine TINYINT(1) DEFAULT NULL, balcon TINYINT(1) DEFAULT NULL, garage TINYINT(1) DEFAULT NULL, parking TINYINT(1) DEFAULT NULL, personne_handicapee TINYINT(1) DEFAULT NULL, investissement_locatif TINYINT(1) DEFAULT NULL, visitevirtuelle TINYINT(1) DEFAULT NULL, slug VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_transaction (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DBF396750 FOREIGN KEY (id) REFERENCES lebien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399DBF396750 FOREIGN KEY (id) REFERENCES lebien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE real_estate ADD type_transaction_id INT DEFAULT NULL, ADD statut_annonce TINYINT(1) NOT NULL, ADD adresse_propritaire VARCHAR(255) DEFAULT NULL, ADD ville_adresse_propritaidre VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE real_estate ADD CONSTRAINT FK_DE4E97A87903E29B FOREIGN KEY (type_transaction_id) REFERENCES type_transaction (id)');
        $this->addSql('CREATE INDEX IDX_DE4E97A87903E29B ON real_estate (type_transaction_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8DBF396750');
        $this->addSql('ALTER TABLE house DROP FOREIGN KEY FK_67D5399DBF396750');
        $this->addSql('ALTER TABLE real_estate DROP FOREIGN KEY FK_DE4E97A87903E29B');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE lebien');
        $this->addSql('DROP TABLE type_transaction');
        $this->addSql('DROP INDEX IDX_DE4E97A87903E29B ON real_estate');
        $this->addSql('ALTER TABLE real_estate DROP type_transaction_id, DROP statut_annonce, DROP adresse_propritaire, DROP ville_adresse_propritaidre');
    }
}
