<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106102854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_actualite (image_id INT NOT NULL, actualite_id INT NOT NULL, INDEX IDX_8C105AC33DA5256D (image_id), INDEX IDX_8C105AC3A2843073 (actualite_id), PRIMARY KEY(image_id, actualite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_actualite ADD CONSTRAINT FK_8C105AC33DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_actualite ADD CONSTRAINT FK_8C105AC3A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_actualite DROP FOREIGN KEY FK_8C105AC33DA5256D');
        $this->addSql('ALTER TABLE image_actualite DROP FOREIGN KEY FK_8C105AC3A2843073');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_actualite');
    }
}
