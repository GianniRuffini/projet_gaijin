<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101122836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_home (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE home ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD012469DE2 FOREIGN KEY (category_id) REFERENCES category_home (id)');
        $this->addSql('CREATE INDEX IDX_71D60CD012469DE2 ON home (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD012469DE2');
        $this->addSql('DROP TABLE category_home');
        $this->addSql('DROP INDEX IDX_71D60CD012469DE2 ON home');
        $this->addSql('ALTER TABLE home DROP category_id');
    }
}
