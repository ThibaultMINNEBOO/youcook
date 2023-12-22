<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222102257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE constitute DROP INDEX UNIQ_861C0FF159D8A214, ADD INDEX IDX_861C0FF159D8A214 (recipe_id)');
        $this->addSql('ALTER TABLE constitute ADD ingredient_id INT DEFAULT NULL, CHANGE recipe_id recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE constitute ADD CONSTRAINT FK_861C0FF1933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('CREATE INDEX IDX_861C0FF1933FE08C ON constitute (ingredient_id)');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787041DE9CD1');
        $this->addSql('DROP INDEX IDX_6BAF787041DE9CD1 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP constitute_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient ADD constitute_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787041DE9CD1 FOREIGN KEY (constitute_id) REFERENCES constitute (id)');
        $this->addSql('CREATE INDEX IDX_6BAF787041DE9CD1 ON ingredient (constitute_id)');
        $this->addSql('ALTER TABLE constitute DROP INDEX IDX_861C0FF159D8A214, ADD UNIQUE INDEX UNIQ_861C0FF159D8A214 (recipe_id)');
        $this->addSql('ALTER TABLE constitute DROP FOREIGN KEY FK_861C0FF1933FE08C');
        $this->addSql('DROP INDEX IDX_861C0FF1933FE08C ON constitute');
        $this->addSql('ALTER TABLE constitute DROP ingredient_id, CHANGE recipe_id recipe_id INT NOT NULL');
    }
}
