<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221135718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE constitute ADD recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE constitute ADD CONSTRAINT FK_861C0FF159D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_861C0FF159D8A214 ON constitute (recipe_id)');
        $this->addSql('ALTER TABLE ingredient ADD constitute_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787041DE9CD1 FOREIGN KEY (constitute_id) REFERENCES constitute (id)');
        $this->addSql('CREATE INDEX IDX_6BAF787041DE9CD1 ON ingredient (constitute_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE constitute DROP FOREIGN KEY FK_861C0FF159D8A214');
        $this->addSql('DROP INDEX UNIQ_861C0FF159D8A214 ON constitute');
        $this->addSql('ALTER TABLE constitute DROP recipe_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin` COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787041DE9CD1');
        $this->addSql('DROP INDEX IDX_6BAF787041DE9CD1 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP constitute_id');
    }
}
