<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112124437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `call` DROP FOREIGN KEY FK_CC8E2F3E7854071C');
        $this->addSql('DROP INDEX IDX_CC8E2F3E7854071C ON `call`');
        $this->addSql('ALTER TABLE `call` CHANGE commercial_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE `call` ADD CONSTRAINT FK_CC8E2F3EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CC8E2F3EA76ED395 ON `call` (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `call` DROP FOREIGN KEY FK_CC8E2F3EA76ED395');
        $this->addSql('DROP INDEX IDX_CC8E2F3EA76ED395 ON `call`');
        $this->addSql('ALTER TABLE `call` CHANGE user_id commercial_id INT NOT NULL');
        $this->addSql('ALTER TABLE `call` ADD CONSTRAINT FK_CC8E2F3E7854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('CREATE INDEX IDX_CC8E2F3E7854071C ON `call` (commercial_id)');
    }
}
