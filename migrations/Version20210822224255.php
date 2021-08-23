<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822224255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE TABLE representationuser (id INT AUTO_INCREMENT NOT NULL, representation_id INT NOT NULL, user_id INT NOT NULL, places VARCHAR(11) DEFAULT NULL, INDEX IDX_11BA5FA746CE82F4 (representation_id), INDEX IDX_11BA5FA7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE representationuser ADD CONSTRAINT FK_11BA5FA746CE82F4 FOREIGN KEY (representation_id) REFERENCES representations (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE representationuser ADD CONSTRAINT FK_11BA5FA7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE RESTRICT');
        $this->addSql('CREATE UNIQUE INDEX artist_type_idx ON artists_types (artist_id, type_id)');
        $this->addSql('ALTER TABLE user CHANGE langue langue VARCHAR(2) NOT NULL, CHANGE created_at created_at VARCHAR(30) NOT NULL, CHANGE updated_at updated_at VARCHAR(30) NOT NULL, CHANGE email_verifed_at email_verifed_at VARCHAR(100) NOT NULL, CHANGE remember_token remember_token VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DROP TABLE representationuser');
        $this->addSql('DROP INDEX artist_type_idx ON artists_types');
        $this->addSql('ALTER TABLE user CHANGE langue langue VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE updated_at updated_at VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email_verifed_at email_verifed_at VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE remember_token remember_token VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
