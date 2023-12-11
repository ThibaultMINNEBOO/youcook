<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231211150701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient ADD store_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870B092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('CREATE INDEX IDX_6BAF7870B092A811 ON ingredient (store_id)');
        $this->addSql('ALTER TABLE store ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF575877A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FF575877A76ED395 ON store (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF575877A76ED395');
        $this->addSql('DROP INDEX UNIQ_FF575877A76ED395 ON store');
        $this->addSql('ALTER TABLE store DROP user_id');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870B092A811');
        $this->addSql('DROP INDEX IDX_6BAF7870B092A811 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP store_id');
    }
}
