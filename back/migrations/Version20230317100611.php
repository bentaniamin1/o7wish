<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317100611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `database` (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C953062E79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE folder (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, path VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_ECA209CD79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, project_name VARCHAR(255) DEFAULT NULL, domain_name VARCHAR(255) DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', vm_username VARCHAR(255) DEFAULT NULL, vm_password VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D64967B2B61E (project_name), UNIQUE INDEX UNIQ_8D93D649F3FF5361 (domain_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `database` ADD CONSTRAINT FK_C953062E79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE folder ADD CONSTRAINT FK_ECA209CD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `database` DROP FOREIGN KEY FK_C953062E79F37AE5');
        $this->addSql('ALTER TABLE folder DROP FOREIGN KEY FK_ECA209CD79F37AE5');
        $this->addSql('DROP TABLE `database`');
        $this->addSql('DROP TABLE folder');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
