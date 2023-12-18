<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218082642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add updatedAt field to User entity';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD updated_at DATETIME NOT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\', CHANGE picture picture_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP updated_at, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\', CHANGE picture_name picture VARCHAR(255) DEFAULT NULL');
    }
}
