<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218151219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_2265B05D5126AC48 ON usuario');
        $this->addSql('ALTER TABLE usuario ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, DROP mail, CHANGE nombre nombre VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON usuario (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON usuario');
        $this->addSql('ALTER TABLE usuario ADD mail VARCHAR(255) NOT NULL, DROP email, DROP roles, CHANGE nombre nombre VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D5126AC48 ON usuario (mail)');
    }
}
