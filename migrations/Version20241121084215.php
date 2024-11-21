<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241121084215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brief_participations (brief_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_E25AAD07757FABFF (brief_id), INDEX IDX_E25AAD07979B1AD6 (company_id), PRIMARY KEY(brief_id, company_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE brief_participations ADD CONSTRAINT FK_E25AAD07757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_participations ADD CONSTRAINT FK_E25AAD07979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_company DROP FOREIGN KEY FK_C4519E00757FABFF');
        $this->addSql('ALTER TABLE brief_company DROP FOREIGN KEY FK_C4519E00979B1AD6');
        $this->addSql('DROP TABLE brief_company');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brief_company (brief_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_C4519E00757FABFF (brief_id), INDEX IDX_C4519E00979B1AD6 (company_id), PRIMARY KEY(brief_id, company_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE brief_company ADD CONSTRAINT FK_C4519E00757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_company ADD CONSTRAINT FK_C4519E00979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_participations DROP FOREIGN KEY FK_E25AAD07757FABFF');
        $this->addSql('ALTER TABLE brief_participations DROP FOREIGN KEY FK_E25AAD07979B1AD6');
        $this->addSql('DROP TABLE brief_participations');
    }
}
