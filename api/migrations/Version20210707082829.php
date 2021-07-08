<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210707082829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD date_published DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE book DROP title');
        $this->addSql('ALTER TABLE book DROP publication_date');
        $this->addSql('ALTER TABLE book ALTER author DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE book ADD publication_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE book DROP name');
        $this->addSql('ALTER TABLE book DROP date_published');
        $this->addSql('ALTER TABLE book ALTER author SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN book.publication_date IS \'(DC2Type:datetime_immutable)\'');
    }
}
