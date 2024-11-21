<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241121202331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F205044A9');
        $this->addSql('DROP INDEX IDX_4FBF094F205044A9 ON company');
        $this->addSql('ALTER TABLE company DROP company_roles_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD company_roles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F205044A9 FOREIGN KEY (company_roles_id) REFERENCES roles_company (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094F205044A9 ON company (company_roles_id)');
    }
}
