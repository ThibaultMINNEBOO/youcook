<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127105202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipe_tool (recipe_id INT NOT NULL, tool_id INT NOT NULL, INDEX IDX_5FE8640E59D8A214 (recipe_id), INDEX IDX_5FE8640E8F7B22CC (tool_id), PRIMARY KEY(recipe_id, tool_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe_tool ADD CONSTRAINT FK_5FE8640E59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_tool ADD CONSTRAINT FK_5FE8640E8F7B22CC FOREIGN KEY (tool_id) REFERENCES tool (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe_tool DROP FOREIGN KEY FK_5FE8640E59D8A214');
        $this->addSql('ALTER TABLE recipe_tool DROP FOREIGN KEY FK_5FE8640E8F7B22CC');
        $this->addSql('DROP TABLE recipe_tool');
    }
}
