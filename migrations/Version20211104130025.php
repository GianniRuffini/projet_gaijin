<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104130025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenus_accueil DROP FOREIGN KEY FK_AF615DA528CDC89C');
        $this->addSql('DROP INDEX UNIQ_AF615DA528CDC89C ON contenus_accueil');
        $this->addSql('ALTER TABLE contenus_accueil DROP home_id');
        $this->addSql('ALTER TABLE home ADD contenus_accueil_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD08C5228C3 FOREIGN KEY (contenus_accueil_id) REFERENCES contenus_accueil (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_71D60CD08C5228C3 ON home (contenus_accueil_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenus_accueil ADD home_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contenus_accueil ADD CONSTRAINT FK_AF615DA528CDC89C FOREIGN KEY (home_id) REFERENCES home (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AF615DA528CDC89C ON contenus_accueil (home_id)');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD08C5228C3');
        $this->addSql('DROP INDEX UNIQ_71D60CD08C5228C3 ON home');
        $this->addSql('ALTER TABLE home DROP contenus_accueil_id');
    }
}
