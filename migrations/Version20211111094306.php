<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211111094306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C46D28043B');
        $this->addSql('DROP INDEX IDX_D9BEC0C46D28043B ON commentaires');
        $this->addSql('ALTER TABLE commentaires CHANGE authentification_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C4A76ED395 ON commentaires (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4A76ED395');
        $this->addSql('DROP INDEX IDX_D9BEC0C4A76ED395 ON commentaires');
        $this->addSql('ALTER TABLE commentaires CHANGE user_id authentification_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C46D28043B FOREIGN KEY (authentification_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C46D28043B ON commentaires (authentification_id)');
    }
}
