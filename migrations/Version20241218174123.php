<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218174123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eventos ADD organizador_id INT NOT NULL');
        $this->addSql('ALTER TABLE eventos ADD CONSTRAINT FK_6B23BD8F62F40C3D FOREIGN KEY (creador_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE eventos ADD CONSTRAINT FK_6B23BD8FE3445778 FOREIGN KEY (organizador_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_6B23BD8F62F40C3D ON eventos (creador_id)');
        $this->addSql('CREATE INDEX IDX_6B23BD8FE3445778 ON eventos (organizador_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eventos DROP FOREIGN KEY FK_6B23BD8F62F40C3D');
        $this->addSql('ALTER TABLE eventos DROP FOREIGN KEY FK_6B23BD8FE3445778');
        $this->addSql('DROP INDEX IDX_6B23BD8F62F40C3D ON eventos');
        $this->addSql('DROP INDEX IDX_6B23BD8FE3445778 ON eventos');
        $this->addSql('ALTER TABLE eventos DROP organizador_id');
    }
}
