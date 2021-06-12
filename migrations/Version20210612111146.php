<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210612111146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artists_types ADD CONSTRAINT FK_29173A3AB7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE artists_types ADD CONSTRAINT FK_29173A3AC54C8C93 FOREIGN KEY (type_id) REFERENCES types (id)');
        $this->addSql('CREATE UNIQUE INDEX artist_type_idx ON artists_types (artist_id, type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artists_types DROP FOREIGN KEY FK_29173A3AB7970CF8');
        $this->addSql('ALTER TABLE artists_types DROP FOREIGN KEY FK_29173A3AC54C8C93');
        $this->addSql('DROP INDEX artist_type_idx ON artists_types');
    }
}
