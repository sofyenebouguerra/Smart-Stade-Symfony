<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125174210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_intervention DROP background_color, DROP border_color, DROP text_color, DROP all_day, CHANGE Date_debut_intervention Date_debut_intervention VARCHAR(255) NOT NULL, CHANGE Date_fin_intervention Date_fin_intervention VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_intervention ADD background_color VARCHAR(7) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD border_color VARCHAR(7) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD text_color VARCHAR(7) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD all_day TINYINT(1) NOT NULL, CHANGE Date_debut_intervention Date_debut_intervention DATETIME NOT NULL, CHANGE Date_fin_intervention Date_fin_intervention DATETIME NOT NULL');
    }
}
