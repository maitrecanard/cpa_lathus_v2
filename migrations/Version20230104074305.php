<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230104074305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exploitant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, logo VARCHAR(20) DEFAULT NULL, mail VARCHAR(100) NOT NULL, siren VARCHAR(100) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, city VARCHAR(20) DEFAULT NULL, zipcode VARCHAR(5) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen_content (id INT AUTO_INCREMENT NOT NULL, screen_param_id INT NOT NULL, title VARCHAR(90) NOT NULL, content LONGTEXT DEFAULT NULL, value1 LONGTEXT DEFAULT NULL, value2 LONGTEXT DEFAULT NULL, value3 LONGTEXT DEFAULT NULL, value4 LONGTEXT DEFAULT NULL, value5 LONGTEXT DEFAULT NULL, value6 LONGTEXT DEFAULT NULL, value7 LONGTEXT DEFAULT NULL, value8 LONGTEXT DEFAULT NULL, value9 LONGTEXT DEFAULT NULL, value10 LONGTEXT DEFAULT NULL, start DATE DEFAULT NULL, end DATE DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', activ INT DEFAULT NULL, INDEX IDX_51BEE7672A345C03 (screen_param_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen_movement (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, screen_content_id INT DEFAULT NULL, statut VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_88AE0197A76ED395 (user_id), INDEX IDX_88AE0197163FE364 (screen_content_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen_param (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(90) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(20) NOT NULL, setting1 LONGTEXT DEFAULT NULL, setting2 LONGTEXT DEFAULT NULL, setting3 LONGTEXT DEFAULT NULL, setting4 LONGTEXT DEFAULT NULL, setting5 LONGTEXT DEFAULT NULL, setting6 LONGTEXT DEFAULT NULL, setting7 LONGTEXT DEFAULT NULL, setting8 LONGTEXT DEFAULT NULL, setting9 LONGTEXT DEFAULT NULL, setting10 LONGTEXT DEFAULT NULL, active INT DEFAULT NULL, config LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE screen_content ADD CONSTRAINT FK_51BEE7672A345C03 FOREIGN KEY (screen_param_id) REFERENCES screen_param (id)');
        $this->addSql('ALTER TABLE screen_movement ADD CONSTRAINT FK_88AE0197A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE screen_movement ADD CONSTRAINT FK_88AE0197163FE364 FOREIGN KEY (screen_content_id) REFERENCES screen_content (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screen_content DROP FOREIGN KEY FK_51BEE7672A345C03');
        $this->addSql('ALTER TABLE screen_movement DROP FOREIGN KEY FK_88AE0197A76ED395');
        $this->addSql('ALTER TABLE screen_movement DROP FOREIGN KEY FK_88AE0197163FE364');
        $this->addSql('DROP TABLE exploitant');
        $this->addSql('DROP TABLE screen_content');
        $this->addSql('DROP TABLE screen_movement');
        $this->addSql('DROP TABLE screen_param');
        $this->addSql('DROP TABLE user');
    }
}
