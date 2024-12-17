<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217124437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eventos ADD sala_id INT NOT NULL');
        $this->addSql('ALTER TABLE eventos ADD CONSTRAINT FK_6B23BD8FC51CDF3F FOREIGN KEY (sala_id) REFERENCES salas (id)');
        $this->addSql('CREATE INDEX IDX_6B23BD8FC51CDF3F ON eventos (sala_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eventos DROP FOREIGN KEY FK_6B23BD8FC51CDF3F');
        $this->addSql('DROP INDEX IDX_6B23BD8FC51CDF3F ON eventos');
        $this->addSql('ALTER TABLE eventos DROP sala_id');
    }
}
