<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230907202431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adoption (id INT AUTO_INCREMENT NOT NULL, pet_id INT DEFAULT NULL, adopter_id INT NOT NULL, status VARCHAR(255) NOT NULL, date DATE NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_EDDEB6A9966F7FB6 (pet_id), INDEX IDX_EDDEB6A9A0D47673 (adopter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intake (id INT AUTO_INCREMENT NOT NULL, pet_id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(255) NOT NULL, date DATE NOT NULL, pet_condition VARCHAR(255) NOT NULL, INDEX IDX_AEA2877A966F7FB6 (pet_id), INDEX IDX_AEA2877AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, pet_id INT NOT NULL, body VARCHAR(255) NOT NULL, INDEX IDX_CFBDFA14A76ED395 (user_id), INDEX IDX_CFBDFA14966F7FB6 (pet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organization (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, phone VARCHAR(100) NOT NULL, address VARCHAR(255) DEFAULT NULL, url VARCHAR(100) NOT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C1EE637CF47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outcome (id INT AUTO_INCREMENT NOT NULL, pet_id INT NOT NULL, adopter_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_30BC6DC2966F7FB6 (pet_id), INDEX IDX_30BC6DC2A0D47673 (adopter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, zip INT DEFAULT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, breed VARCHAR(255) NOT NULL, age INT NOT NULL, gender VARCHAR(100) NOT NULL, color VARCHAR(100) NOT NULL, size INT DEFAULT NULL, weight INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, status VARCHAR(100) NOT NULL, vaccinated TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A9966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id)');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A9A0D47673 FOREIGN KEY (adopter_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE intake ADD CONSTRAINT FK_AEA2877A966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id)');
        $this->addSql('ALTER TABLE intake ADD CONSTRAINT FK_AEA2877AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id)');
        $this->addSql('ALTER TABLE outcome ADD CONSTRAINT FK_30BC6DC2966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id)');
        $this->addSql('ALTER TABLE outcome ADD CONSTRAINT FK_30BC6DC2A0D47673 FOREIGN KEY (adopter_id) REFERENCES person (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A9966F7FB6');
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A9A0D47673');
        $this->addSql('ALTER TABLE intake DROP FOREIGN KEY FK_AEA2877A966F7FB6');
        $this->addSql('ALTER TABLE intake DROP FOREIGN KEY FK_AEA2877AA76ED395');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A76ED395');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14966F7FB6');
        $this->addSql('ALTER TABLE outcome DROP FOREIGN KEY FK_30BC6DC2966F7FB6');
        $this->addSql('ALTER TABLE outcome DROP FOREIGN KEY FK_30BC6DC2A0D47673');
        $this->addSql('DROP TABLE adoption');
        $this->addSql('DROP TABLE intake');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE organization');
        $this->addSql('DROP TABLE outcome');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE pet');
        $this->addSql('DROP TABLE user');
    }
}
