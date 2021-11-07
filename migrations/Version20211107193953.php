<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211107193953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adress (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) NOT NULL, street_number INT NOT NULL, postal_code INT NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE biens_dynamic_property (id INT AUTO_INCREMENT NOT NULL, bien_id_properties_id INT DEFAULT NULL, dynamic_property_id_dynamic_property_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_A45FE3F25226F8CF (bien_id_properties_id), INDEX IDX_A45FE3F231B29850 (dynamic_property_id_dynamic_property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, reservations_id_reservations_id INT DEFAULT NULL, context LONGTEXT NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5F9E962AC2BB5F38 (reservations_id_reservations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conversations (id INT AUTO_INCREMENT NOT NULL, biens_id_properties_id INT DEFAULT NULL, user_id_user_id INT DEFAULT NULL, conversations_col VARCHAR(255) NOT NULL, INDEX IDX_C2521BF12DAF4A81 (biens_id_properties_id), INDEX IDX_C2521BF1DE94BC09 (user_id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dynamic_property (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value_type VARCHAR(255) NOT NULL, bien_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipements (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, conversations_id_conversations_id INT NOT NULL, content VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DB021E96BB0FA222 (conversations_id_conversations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures (id INT AUTO_INCREMENT NOT NULL, bien_id_properties_id INT DEFAULT NULL, titletitle VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image LONGBLOB NOT NULL, INDEX IDX_8F7C2FC05226F8CF (bien_id_properties_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, properties_id_properties_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_D499BFF6CAEFD7A3 (properties_id_properties_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE properties (id INT AUTO_INCREMENT NOT NULL, owner_id_user_id INT DEFAULT NULL, property_type_id_property_type_id INT DEFAULT NULL, adress_id_adress_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', rooms INT NOT NULL, description LONGTEXT NOT NULL, surface DOUBLE PRECISION NOT NULL, location VARCHAR(255) NOT NULL, hosting_capacity INT NOT NULL, check_int_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', check_out_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', rate DOUBLE PRECISION NOT NULL, reviews INT DEFAULT NULL, INDEX IDX_87C331C72B99E3A0 (owner_id_user_id), INDEX IDX_87C331C750F920B9 (property_type_id_property_type_id), UNIQUE INDEX UNIQ_87C331C7A9268593 (adress_id_adress_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE properties_equipements (id INT AUTO_INCREMENT NOT NULL, equipements_id_equipements_id INT DEFAULT NULL, biens_id_properties_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_3DDB17F267F740FD (equipements_id_equipements_id), INDEX IDX_3DDB17F22DAF4A81 (biens_id_properties_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_type (id INT AUTO_INCREMENT NOT NULL, typetype VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, tenant_id_user_id INT NOT NULL, properties_id_properties_id INT DEFAULT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', arrival_date DATE NOT NULL, departure_date DATE NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', price DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, total_price DOUBLE PRECISION NOT NULL, insurance INT NOT NULL, statut VARCHAR(45) NOT NULL, INDEX IDX_4DA23981B22C4D (tenant_id_user_id), INDEX IDX_4DA239CAEFD7A3 (properties_id_properties_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birth_day DATE NOT NULL, sexe VARCHAR(45) NOT NULL, phone VARCHAR(45) NOT NULL, sign_up_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE biens_dynamic_property ADD CONSTRAINT FK_A45FE3F25226F8CF FOREIGN KEY (bien_id_properties_id) REFERENCES properties (id)');
        $this->addSql('ALTER TABLE biens_dynamic_property ADD CONSTRAINT FK_A45FE3F231B29850 FOREIGN KEY (dynamic_property_id_dynamic_property_id) REFERENCES dynamic_property (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AC2BB5F38 FOREIGN KEY (reservations_id_reservations_id) REFERENCES reservations (id)');
        $this->addSql('ALTER TABLE conversations ADD CONSTRAINT FK_C2521BF12DAF4A81 FOREIGN KEY (biens_id_properties_id) REFERENCES properties (id)');
        $this->addSql('ALTER TABLE conversations ADD CONSTRAINT FK_C2521BF1DE94BC09 FOREIGN KEY (user_id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96BB0FA222 FOREIGN KEY (conversations_id_conversations_id) REFERENCES conversations (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC05226F8CF FOREIGN KEY (bien_id_properties_id) REFERENCES properties (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6CAEFD7A3 FOREIGN KEY (properties_id_properties_id) REFERENCES properties (id)');
        $this->addSql('ALTER TABLE properties ADD CONSTRAINT FK_87C331C72B99E3A0 FOREIGN KEY (owner_id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE properties ADD CONSTRAINT FK_87C331C750F920B9 FOREIGN KEY (property_type_id_property_type_id) REFERENCES property_type (id)');
        $this->addSql('ALTER TABLE properties ADD CONSTRAINT FK_87C331C7A9268593 FOREIGN KEY (adress_id_adress_id) REFERENCES adress (id)');
        $this->addSql('ALTER TABLE properties_equipements ADD CONSTRAINT FK_3DDB17F267F740FD FOREIGN KEY (equipements_id_equipements_id) REFERENCES equipements (id)');
        $this->addSql('ALTER TABLE properties_equipements ADD CONSTRAINT FK_3DDB17F22DAF4A81 FOREIGN KEY (biens_id_properties_id) REFERENCES properties (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA23981B22C4D FOREIGN KEY (tenant_id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239CAEFD7A3 FOREIGN KEY (properties_id_properties_id) REFERENCES properties (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE properties DROP FOREIGN KEY FK_87C331C7A9268593');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96BB0FA222');
        $this->addSql('ALTER TABLE biens_dynamic_property DROP FOREIGN KEY FK_A45FE3F231B29850');
        $this->addSql('ALTER TABLE properties_equipements DROP FOREIGN KEY FK_3DDB17F267F740FD');
        $this->addSql('ALTER TABLE biens_dynamic_property DROP FOREIGN KEY FK_A45FE3F25226F8CF');
        $this->addSql('ALTER TABLE conversations DROP FOREIGN KEY FK_C2521BF12DAF4A81');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC05226F8CF');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6CAEFD7A3');
        $this->addSql('ALTER TABLE properties_equipements DROP FOREIGN KEY FK_3DDB17F22DAF4A81');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239CAEFD7A3');
        $this->addSql('ALTER TABLE properties DROP FOREIGN KEY FK_87C331C750F920B9');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AC2BB5F38');
        $this->addSql('ALTER TABLE conversations DROP FOREIGN KEY FK_C2521BF1DE94BC09');
        $this->addSql('ALTER TABLE properties DROP FOREIGN KEY FK_87C331C72B99E3A0');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA23981B22C4D');
        $this->addSql('DROP TABLE adress');
        $this->addSql('DROP TABLE biens_dynamic_property');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE conversations');
        $this->addSql('DROP TABLE dynamic_property');
        $this->addSql('DROP TABLE equipements');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE pictures');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE properties');
        $this->addSql('DROP TABLE properties_equipements');
        $this->addSql('DROP TABLE property_type');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE `user`');
    }
}
