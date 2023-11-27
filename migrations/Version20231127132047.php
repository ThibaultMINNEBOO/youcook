<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127132047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipes_user ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipes_user ADD CONSTRAINT FK_B6CBB700A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6CBB700A76ED395 ON recipes_user (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipes_user DROP FOREIGN KEY FK_B6CBB700A76ED395');
        $this->addSql('DROP INDEX IDX_B6CBB700A76ED395 ON recipes_user');
        $this->addSql('ALTER TABLE recipes_user DROP user_id');
    }
}
