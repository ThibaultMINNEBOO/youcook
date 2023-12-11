<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231211151027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870B092A811');
        $this->addSql('DROP INDEX IDX_6BAF7870B092A811 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP store_id');
        $this->addSql('ALTER TABLE store ADD ingredients_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF5758773EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredient (id)');
        $this->addSql('CREATE INDEX IDX_FF5758773EC4DCE ON store (ingredients_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient ADD store_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870B092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('CREATE INDEX IDX_6BAF7870B092A811 ON ingredient (store_id)');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF5758773EC4DCE');
        $this->addSql('DROP INDEX IDX_FF5758773EC4DCE ON store');
        $this->addSql('ALTER TABLE store DROP ingredients_id');
    }
}
