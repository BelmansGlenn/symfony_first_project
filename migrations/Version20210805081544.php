<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210805081544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assets (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, song VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_79D17D8E4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_orders (product_id INT NOT NULL, orders_id INT NOT NULL, INDEX IDX_8753BC4A4584665A (product_id), INDEX IDX_8753BC4ACFFE9AD6 (orders_id), PRIMARY KEY(product_id, orders_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assets ADD CONSTRAINT FK_79D17D8E4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_orders ADD CONSTRAINT FK_8753BC4A4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_orders ADD CONSTRAINT FK_8753BC4ACFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD stock INT NOT NULL, ADD price_hors_tva DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE assets');
        $this->addSql('DROP TABLE product_orders');
        $this->addSql('ALTER TABLE product DROP stock, DROP price_hors_tva');
    }
}
