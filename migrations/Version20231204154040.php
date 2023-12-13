<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204154040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compose ADD step_id INT DEFAULT NULL, ADD recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compose ADD CONSTRAINT FK_AE4C141673B21E9C FOREIGN KEY (step_id) REFERENCES step (id)');
        $this->addSql('ALTER TABLE compose ADD CONSTRAINT FK_AE4C141659D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_AE4C141673B21E9C ON compose (step_id)');
        $this->addSql('CREATE INDEX IDX_AE4C141659D8A214 ON compose (recipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compose DROP FOREIGN KEY FK_AE4C141673B21E9C');
        $this->addSql('ALTER TABLE compose DROP FOREIGN KEY FK_AE4C141659D8A214');
        $this->addSql('DROP INDEX IDX_AE4C141673B21E9C ON compose');
        $this->addSql('DROP INDEX IDX_AE4C141659D8A214 ON compose');
        $this->addSql('ALTER TABLE compose DROP step_id, DROP recipe_id');
    }
}
