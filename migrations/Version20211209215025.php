<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209215025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materielles ADD id_stade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materielles ADD CONSTRAINT FK_1FC39BAD35E347D6 FOREIGN KEY (id_stade_id) REFERENCES stade (id)');
        $this->addSql('CREATE INDEX IDX_1FC39BAD35E347D6 ON materielles (id_stade_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materielles DROP FOREIGN KEY FK_1FC39BAD35E347D6');
        $this->addSql('DROP INDEX IDX_1FC39BAD35E347D6 ON materielles');
        $this->addSql('ALTER TABLE materielles DROP id_stade_id');
    }
}
