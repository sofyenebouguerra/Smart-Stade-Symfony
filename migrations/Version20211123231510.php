<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123231510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_intervention (ID_demande_intervention INT AUTO_INCREMENT NOT NULL, Type_intervention VARCHAR(50) NOT NULL, Intervention_demandee VARCHAR(255) NOT NULL, Date_debut_intervention VARCHAR(255) NOT NULL, Date_fin_intervention VARCHAR(255) NOT NULL, Service_demandeur VARCHAR(255) NOT NULL, Degre_urgence INT NOT NULL, PRIMARY KEY(ID_demande_intervention)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande_intervention');
    }
}
