<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005123455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE faq ADD categorie_id INT DEFAULT NULL, ADD faq_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE faq ADD CONSTRAINT FK_E8FF75CCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES category_faq (id)');
        $this->addSql('ALTER TABLE faq ADD CONSTRAINT FK_E8FF75CCBC1FB8CE FOREIGN KEY (faq_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E8FF75CCBCF5E72D ON faq (categorie_id)');
        $this->addSql('CREATE INDEX IDX_E8FF75CCBC1FB8CE ON faq (faq_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE faq DROP FOREIGN KEY FK_E8FF75CCBCF5E72D');
        $this->addSql('ALTER TABLE faq DROP FOREIGN KEY FK_E8FF75CCBC1FB8CE');
        $this->addSql('DROP INDEX IDX_E8FF75CCBCF5E72D ON faq');
        $this->addSql('DROP INDEX IDX_E8FF75CCBC1FB8CE ON faq');
        $this->addSql('ALTER TABLE faq DROP categorie_id, DROP faq_user_id');
    }
}
