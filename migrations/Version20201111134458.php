<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201111134458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `call` (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, commercial_id INT NOT NULL, client_id INT NOT NULL, date DATE NOT NULL, hour TIME NOT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_CC8E2F3E6BF700BD (status_id), INDEX IDX_CC8E2F3E7854071C (commercial_id), INDEX IDX_CC8E2F3E19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, service_id INT NOT NULL, customername VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, address VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, telephone VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), UNIQUE INDEX UNIQ_C7440455ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercial (id INT AUTO_INCREMENT NOT NULL, commercialname VARCHAR(50) NOT NULL, email VARCHAR(50) DEFAULT NULL, telephone VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, commercial_id INT DEFAULT NULL, client_id INT NOT NULL, service_id INT NOT NULL, teacher_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_5E90F6D67854071C (commercial_id), INDEX IDX_5E90F6D619EB6921 (client_id), INDEX IDX_5E90F6D6ED5CA9E6 (service_id), INDEX IDX_5E90F6D641807E1D (teacher_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, nameservice VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, detail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, speciality_id INT DEFAULT NULL, teachername VARCHAR(50) NOT NULL, telephone VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_B0F6A6D53B5A08D7 (speciality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `call` ADD CONSTRAINT FK_CC8E2F3E6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE `call` ADD CONSTRAINT FK_CC8E2F3E7854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('ALTER TABLE `call` ADD CONSTRAINT FK_CC8E2F3E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D67854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D641807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D53B5A08D7 FOREIGN KEY (speciality_id) REFERENCES service (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `call` DROP FOREIGN KEY FK_CC8E2F3E19EB6921');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D619EB6921');
        $this->addSql('ALTER TABLE `call` DROP FOREIGN KEY FK_CC8E2F3E7854071C');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D67854071C');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455ED5CA9E6');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6ED5CA9E6');
        $this->addSql('ALTER TABLE teacher DROP FOREIGN KEY FK_B0F6A6D53B5A08D7');
        $this->addSql('ALTER TABLE `call` DROP FOREIGN KEY FK_CC8E2F3E6BF700BD');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D641807E1D');
        $this->addSql('DROP TABLE `call`');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commercial');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE user');
    }
}
