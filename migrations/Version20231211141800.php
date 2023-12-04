<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231211141800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compose DROP FOREIGN KEY FK_AE4C141659D8A214');
        $this->addSql('ALTER TABLE compose DROP FOREIGN KEY FK_AE4C141673B21E9C');
        $this->addSql('DROP TABLE compose');
        $this->addSql('ALTER TABLE recipe ADD day INT NOT NULL, ADD hour INT NOT NULL, ADD minute INT NOT NULL, DROP time');
        $this->addSql('ALTER TABLE step ADD recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_43B9FE3C59D8A214 ON step (recipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compose (id INT AUTO_INCREMENT NOT NULL, step_id INT DEFAULT NULL, recipe_id INT DEFAULT NULL, step_number INT NOT NULL, INDEX IDX_AE4C141659D8A214 (recipe_id), INDEX IDX_AE4C141673B21E9C (step_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE compose ADD CONSTRAINT FK_AE4C141659D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE compose ADD CONSTRAINT FK_AE4C141673B21E9C FOREIGN KEY (step_id) REFERENCES step (id)');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C59D8A214');
        $this->addSql('DROP INDEX IDX_43B9FE3C59D8A214 ON step');
        $this->addSql('ALTER TABLE step DROP recipe_id');
        $this->addSql('ALTER TABLE recipe ADD time DATETIME NOT NULL, DROP day, DROP hour, DROP minute');
    }
}
