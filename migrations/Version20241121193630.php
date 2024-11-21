<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241121193630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_roles_company (company_id INT NOT NULL, roles_company_id INT NOT NULL, INDEX IDX_9C35DC9979B1AD6 (company_id), INDEX IDX_9C35DC9DBBC245E (roles_company_id), PRIMARY KEY(company_id, roles_company_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_roles_company ADD CONSTRAINT FK_9C35DC9979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_roles_company ADD CONSTRAINT FK_9C35DC9DBBC245E FOREIGN KEY (roles_company_id) REFERENCES roles_company (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_roles_company DROP FOREIGN KEY FK_9C35DC9979B1AD6');
        $this->addSql('ALTER TABLE company_roles_company DROP FOREIGN KEY FK_9C35DC9DBBC245E');
        $this->addSql('DROP TABLE company_roles_company');
    }
}
