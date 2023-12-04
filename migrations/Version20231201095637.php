<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201095637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe ADD recipe_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137C6B4D386 FOREIGN KEY (recipe_category_id) REFERENCES recipes_category (id)');
        $this->addSql('CREATE INDEX IDX_DA88B137C6B4D386 ON recipe (recipe_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137C6B4D386');
        $this->addSql('DROP INDEX IDX_DA88B137C6B4D386 ON recipe');
        $this->addSql('ALTER TABLE recipe DROP recipe_category_id');
    }
}
