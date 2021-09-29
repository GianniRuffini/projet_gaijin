<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929150609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenus ADD titre_guide_de_voyage VARCHAR(255) DEFAULT NULL, ADD sous_titre_guide_de_voyage VARCHAR(255) DEFAULT NULL, ADD description_guide_de_voyage LONGTEXT DEFAULT NULL, ADD active_guide_de_voyage TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenus DROP titre_guide_de_voyage, DROP sous_titre_guide_de_voyage, DROP description_guide_de_voyage, DROP active_guide_de_voyage');
    }
}
