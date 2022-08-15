<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220815154026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE category_faq CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE category_home CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE commentaires CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C44C2885D7 FOREIGN KEY (annonces_id) REFERENCES faq (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4727ACA70 FOREIGN KEY (parent_id) REFERENCES commentaires (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE contenus CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE contenus ADD CONSTRAINT FK_ADE1203612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE contenus_accueil CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE sous_titre sous_titre VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE faq CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE faq ADD CONSTRAINT FK_E8FF75CCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES category_faq (id)');
        $this->addSql('ALTER TABLE faq ADD CONSTRAINT FK_E8FF75CCBC1FB8CE FOREIGN KEY (faq_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E8FF75CCBCF5E72D ON faq (categorie_id)');
        $this->addSql('CREATE INDEX IDX_E8FF75CCBC1FB8CE ON faq (faq_user_id)');
        $this->addSql('ALTER TABLE home CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD012469DE2 FOREIGN KEY (category_id) REFERENCES category_home (id)');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD08C5228C3 FOREIGN KEY (contenus_accueil_id) REFERENCES contenus_accueil (id)');
        $this->addSql('CREATE INDEX IDX_71D60CD012469DE2 ON home (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_71D60CD08C5228C3 ON home (contenus_accueil_id)');
        $this->addSql('ALTER TABLE photo CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE prefecture CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511A98260155 FOREIGN KEY (region_id) REFERENCES contenus (id)');
        $this->addSql('CREATE INDEX IDX_ABE6511A98260155 ON prefecture (region_id)');
        $this->addSql('ALTER TABLE reset_password_request CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7CE748AA76ED395 ON reset_password_request (user_id)');
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE user_prefecture ADD PRIMARY KEY (user_id, prefecture_id)');
        $this->addSql('ALTER TABLE user_prefecture ADD CONSTRAINT FK_C8197F6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_prefecture ADD CONSTRAINT FK_C8197F69D39C865 FOREIGN KEY (prefecture_id) REFERENCES prefecture (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_C8197F6A76ED395 ON user_prefecture (user_id)');
        $this->addSql('CREATE INDEX IDX_C8197F69D39C865 ON user_prefecture (prefecture_id)');
        $this->addSql('ALTER TABLE video CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE category_faq CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE category_home CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C44C2885D7');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4727ACA70');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4A76ED395');
        $this->addSql('ALTER TABLE commentaires CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE contact CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE contenus DROP FOREIGN KEY FK_ADE1203612469DE2');
        $this->addSql('ALTER TABLE contenus CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE contenus_accueil CHANGE id id INT NOT NULL, CHANGE sous_titre sous_titre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE faq MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE faq DROP FOREIGN KEY FK_E8FF75CCBCF5E72D');
        $this->addSql('ALTER TABLE faq DROP FOREIGN KEY FK_E8FF75CCBC1FB8CE');
        $this->addSql('DROP INDEX IDX_E8FF75CCBCF5E72D ON faq');
        $this->addSql('DROP INDEX IDX_E8FF75CCBC1FB8CE ON faq');
        $this->addSql('ALTER TABLE faq DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE faq CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE home MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD012469DE2');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD08C5228C3');
        $this->addSql('DROP INDEX IDX_71D60CD012469DE2 ON home');
        $this->addSql('DROP INDEX UNIQ_71D60CD08C5228C3 ON home');
        $this->addSql('ALTER TABLE home DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE home CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE photo MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE photo DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE photo CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE prefecture MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511A98260155');
        $this->addSql('DROP INDEX IDX_ABE6511A98260155 ON prefecture');
        $this->addSql('ALTER TABLE prefecture DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE prefecture CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE reset_password_request MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP INDEX IDX_7CE748AA76ED395 ON reset_password_request');
        $this->addSql('ALTER TABLE reset_password_request DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE reset_password_request CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE user MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE user_prefecture DROP FOREIGN KEY FK_C8197F6A76ED395');
        $this->addSql('ALTER TABLE user_prefecture DROP FOREIGN KEY FK_C8197F69D39C865');
        $this->addSql('DROP INDEX IDX_C8197F6A76ED395 ON user_prefecture');
        $this->addSql('DROP INDEX IDX_C8197F69D39C865 ON user_prefecture');
        $this->addSql('ALTER TABLE user_prefecture DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE video MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE video DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE video CHANGE id id INT NOT NULL');
    }
}
