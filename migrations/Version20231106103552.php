<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106103552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite_image (actualite_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_BF1CF859A2843073 (actualite_id), INDEX IDX_BF1CF8593DA5256D (image_id), PRIMARY KEY(actualite_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualite_image ADD CONSTRAINT FK_BF1CF859A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_image ADD CONSTRAINT FK_BF1CF8593DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_actualite DROP FOREIGN KEY FK_8C105AC33DA5256D');
        $this->addSql('ALTER TABLE image_actualite DROP FOREIGN KEY FK_8C105AC3A2843073');
        $this->addSql('DROP TABLE image_actualite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_actualite (image_id INT NOT NULL, actualite_id INT NOT NULL, INDEX IDX_8C105AC3A2843073 (actualite_id), INDEX IDX_8C105AC33DA5256D (image_id), PRIMARY KEY(image_id, actualite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE image_actualite ADD CONSTRAINT FK_8C105AC33DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_actualite ADD CONSTRAINT FK_8C105AC3A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_image DROP FOREIGN KEY FK_BF1CF859A2843073');
        $this->addSql('ALTER TABLE actualite_image DROP FOREIGN KEY FK_BF1CF8593DA5256D');
        $this->addSql('DROP TABLE actualite_image');
    }
}
