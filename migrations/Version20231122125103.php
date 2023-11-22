<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122125103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE country_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE coupon_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE coupon_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE currency_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_price_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tax_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE country (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE coupon (id INT NOT NULL, type_id INT NOT NULL, code VARCHAR(255) NOT NULL, discount_percent INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_64BF3F02C54C8C93 ON coupon (type_id)');
        $this->addSql('CREATE TABLE coupon_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE currency (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, product_price_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD1DA4AD70 ON product (product_price_id)');
        $this->addSql('CREATE TABLE product_price (id INT NOT NULL, currency_id INT DEFAULT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B94598538248176 ON product_price (currency_id)');
        $this->addSql('CREATE TABLE tax (id INT NOT NULL, country_id INT NOT NULL, rate INT NOT NULL, tax_number_format VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8E81BA76F92F3E70 ON tax (country_id)');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02C54C8C93 FOREIGN KEY (type_id) REFERENCES coupon_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD1DA4AD70 FOREIGN KEY (product_price_id) REFERENCES product_price (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B94598538248176 FOREIGN KEY (currency_id) REFERENCES currency (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tax ADD CONSTRAINT FK_8E81BA76F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needsNc
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE country_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE coupon_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE coupon_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE currency_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_price_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tax_id_seq CASCADE');
        $this->addSql('ALTER TABLE coupon DROP CONSTRAINT FK_64BF3F02C54C8C93');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD1DA4AD70');
        $this->addSql('ALTER TABLE product_price DROP CONSTRAINT FK_6B94598538248176');
        $this->addSql('ALTER TABLE tax DROP CONSTRAINT FK_8E81BA76F92F3E70');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE coupon');
        $this->addSql('DROP TABLE coupon_type');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_price');
        $this->addSql('DROP TABLE tax');
    }
}
