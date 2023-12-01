<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201093810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipes_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13759382FF0');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13793C83786');
        $this->addSql('DROP INDEX IDX_DA88B13793C83786 ON recipe');
        $this->addSql('DROP INDEX IDX_DA88B13759382FF0 ON recipe');
        $this->addSql('ALTER TABLE recipe DROP favorite_recipe_id, DROP user_recipe_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recipes_category');
        $this->addSql('ALTER TABLE recipe ADD favorite_recipe_id INT DEFAULT NULL, ADD user_recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13759382FF0 FOREIGN KEY (user_recipe_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13793C83786 FOREIGN KEY (favorite_recipe_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DA88B13793C83786 ON recipe (favorite_recipe_id)');
        $this->addSql('CREATE INDEX IDX_DA88B13759382FF0 ON recipe (user_recipe_id)');
    }
}
