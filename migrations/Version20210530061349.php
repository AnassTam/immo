<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210530061349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE real_estate ADD reference INT NOT NULL, ADD chambre INT DEFAULT NULL, ADD standing INT DEFAULT NULL, ADD etat_du_bien VARCHAR(255) DEFAULT NULL, ADD vue_dubien VARCHAR(255) DEFAULT NULL, ADD eau_chaude VARCHAR(255) DEFAULT NULL, ADD chauffage VARCHAR(255) DEFAULT NULL, ADD style_du_bien VARCHAR(255) DEFAULT NULL, ADD niveau VARCHAR(255) DEFAULT NULL, ADD ascenseur TINYINT(1) DEFAULT NULL, ADD duplex TINYINT(1) DEFAULT NULL, ADD loft TINYINT(1) DEFAULT NULL, ADD dernier_etage TINYINT(1) DEFAULT NULL, ADD avec_piscine TINYINT(1) DEFAULT NULL, ADD balcon TINYINT(1) DEFAULT NULL, ADD garage TINYINT(1) DEFAULT NULL, ADD parking TINYINT(1) DEFAULT NULL, ADD personne_handicapee TINYINT(1) DEFAULT NULL, ADD investissement_locatif TINYINT(1) DEFAULT NULL, ADD visitevirtuelle TINYINT(1) DEFAULT NULL, ADD exposition VARCHAR(255) DEFAULT NULL, ADD annee_construction INT DEFAULT NULL, ADD annee_renovation INT DEFAULT NULL, ADD etage VARCHAR(255) DEFAULT NULL, ADD charge INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE real_estate DROP reference, DROP chambre, DROP standing, DROP etat_du_bien, DROP vue_dubien, DROP eau_chaude, DROP chauffage, DROP style_du_bien, DROP niveau, DROP ascenseur, DROP duplex, DROP loft, DROP dernier_etage, DROP avec_piscine, DROP balcon, DROP garage, DROP parking, DROP personne_handicapee, DROP investissement_locatif, DROP visitevirtuelle, DROP exposition, DROP annee_construction, DROP annee_renovation, DROP etage, DROP charge');
    }
}
