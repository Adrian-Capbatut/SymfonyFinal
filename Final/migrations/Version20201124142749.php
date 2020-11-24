<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124142749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bilete (id INT AUTO_INCREMENT NOT NULL, calator_id INT NOT NULL, loc_plecare VARCHAR(255) NOT NULL, data_plecare DATE NOT NULL, ora_plecare TIME NOT NULL, destinatia VARCHAR(255) NOT NULL, data_sosire DATE NOT NULL, ora_sosire TIME NOT NULL, INDEX IDX_29BB729BEB206B39 (calator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE calatori (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, prenume VARCHAR(255) NOT NULL, varsta INT NOT NULL, cod_personal VARCHAR(255) NOT NULL, adresa VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bilete ADD CONSTRAINT FK_29BB729BEB206B39 FOREIGN KEY (calator_id) REFERENCES calatori (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bilete DROP FOREIGN KEY FK_29BB729BEB206B39');
        $this->addSql('DROP TABLE bilete');
        $this->addSql('DROP TABLE calatori');
    }
}
