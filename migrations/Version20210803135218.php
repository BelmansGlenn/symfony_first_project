<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803135218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, address LONGTEXT NOT NULL, complement LONGTEXT DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, postal VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, carriercol VARCHAR(45) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_product (categories_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_FB40D50DA21214B7 (categories_id), INDEX IDX_FB40D50D4584665A (product_id), PRIMARY KEY(categories_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, orders_id INT DEFAULT NULL, product_name LONGTEXT NOT NULL, product_price DOUBLE PRECISION NOT NULL, quantity LONGTEXT NOT NULL, subtotal_ht LONGTEXT NOT NULL, taxe DOUBLE PRECISION NOT NULL, subtotal_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_845CA2C1CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, full_name LONGTEXT NOT NULL, carrier_name VARCHAR(255) DEFAULT NULL, carrier_price DOUBLE PRECISION DEFAULT NULL, delivery_address LONGTEXT NOT NULL, is_paid TINYINT(1) DEFAULT NULL, more_informations LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_E52FFDEEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, description VARCHAR(45) NOT NULL, informations_complementaire VARCHAR(45) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, is_best TINYTEXT DEFAULT NULL, is_new_arrival TINYTEXT DEFAULT NULL, is_featured TINYINT(1) DEFAULT NULL, is_special_offer TINYTEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE related_product (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, related_id INT NOT NULL, INDEX IDX_EC53CE084584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, product_id INT DEFAULT NULL, note VARCHAR(45) NOT NULL, comment VARCHAR(45) DEFAULT NULL, INDEX IDX_6970EB0FA76ED395 (user_id), INDEX IDX_6970EB0F4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags_product (tags_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_F5F6EFBC8D7B4FB4 (tags_id), INDEX IDX_F5F6EFBC4584665A (product_id), PRIMARY KEY(tags_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(16) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE categories_product ADD CONSTRAINT FK_FB40D50DA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_product ADD CONSTRAINT FK_FB40D50D4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE related_product ADD CONSTRAINT FK_EC53CE084584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE tags_product ADD CONSTRAINT FK_F5F6EFBC8D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags_product ADD CONSTRAINT FK_F5F6EFBC4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories_product DROP FOREIGN KEY FK_FB40D50DA21214B7');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C1CFFE9AD6');
        $this->addSql('ALTER TABLE categories_product DROP FOREIGN KEY FK_FB40D50D4584665A');
        $this->addSql('ALTER TABLE related_product DROP FOREIGN KEY FK_EC53CE084584665A');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F4584665A');
        $this->addSql('ALTER TABLE tags_product DROP FOREIGN KEY FK_F5F6EFBC4584665A');
        $this->addSql('ALTER TABLE tags_product DROP FOREIGN KEY FK_F5F6EFBC8D7B4FB4');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0FA76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE carrier');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_product');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE related_product');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE tags_product');
        $this->addSql('DROP TABLE user');
    }
}
