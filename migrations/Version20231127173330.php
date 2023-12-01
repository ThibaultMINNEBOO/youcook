<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127173330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recipes_favorites');
        $this->addSql('DROP TABLE recipes_user');
        $this->addSql('ALTER TABLE recipe ADD user_recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13759382FF0 FOREIGN KEY (user_recipe_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DA88B13759382FF0 ON recipe (user_recipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipes_favorites (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE recipes_user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13759382FF0');
        $this->addSql('DROP INDEX IDX_DA88B13759382FF0 ON recipe');
        $this->addSql('ALTER TABLE recipe DROP user_recipe_id');
    }
}
