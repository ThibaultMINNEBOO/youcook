<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125214222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add category_id to ingredient table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787012469DE2 FOREIGN KEY (category_id) REFERENCES ingredient_category (id)');
        $this->addSql('CREATE INDEX IDX_6BAF787012469DE2 ON ingredient (category_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787012469DE2');
        $this->addSql('DROP INDEX IDX_6BAF787012469DE2 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP category_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }
}
