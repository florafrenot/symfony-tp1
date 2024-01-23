<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240123134815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_company (client_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_1D824D3219EB6921 (client_id), INDEX IDX_1D824D32979B1AD6 (company_id), PRIMARY KEY(client_id, company_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_company ADD CONSTRAINT FK_1D824D3219EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_company ADD CONSTRAINT FK_1D824D32979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_company DROP FOREIGN KEY FK_1D824D3219EB6921');
        $this->addSql('ALTER TABLE client_company DROP FOREIGN KEY FK_1D824D32979B1AD6');
        $this->addSql('DROP TABLE client_company');
    }
}
