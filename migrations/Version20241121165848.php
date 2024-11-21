<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241121165848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_role_company DROP FOREIGN KEY FK_DBF667AF651387B');
        $this->addSql('ALTER TABLE company_role_company DROP FOREIGN KEY FK_DBF667A979B1AD6');
        $this->addSql('DROP TABLE company_role');
        $this->addSql('DROP TABLE company_role_company');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE company_role_company (company_role_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_DBF667A979B1AD6 (company_id), INDEX IDX_DBF667AF651387B (company_role_id), PRIMARY KEY(company_role_id, company_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE company_role_company ADD CONSTRAINT FK_DBF667AF651387B FOREIGN KEY (company_role_id) REFERENCES company_role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_role_company ADD CONSTRAINT FK_DBF667A979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
    }
}
