<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127141752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe ADD favorite_recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13793C83786 FOREIGN KEY (favorite_recipe_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DA88B13793C83786 ON recipe (favorite_recipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13793C83786');
        $this->addSql('DROP INDEX IDX_DA88B13793C83786 ON recipe');
        $this->addSql('ALTER TABLE recipe DROP favorite_recipe_id');
    }
}
