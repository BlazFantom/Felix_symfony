<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230516133242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE appointment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE appointment (id INT NOT NULL, servises_id INT NOT NULL, client_id INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FE38F844AD23A45A ON appointment (servises_id)');
        $this->addSql('CREATE INDEX IDX_FE38F84419EB6921 ON appointment (client_id)');
        $this->addSql('CREATE TABLE appointment_team (appointment_id INT NOT NULL, team_id INT NOT NULL, PRIMARY KEY(appointment_id, team_id))');
        $this->addSql('CREATE INDEX IDX_D7236EDEE5B533F9 ON appointment_team (appointment_id)');
        $this->addSql('CREATE INDEX IDX_D7236EDE296CD8AE ON appointment_team (team_id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844AD23A45A FOREIGN KEY (servises_id) REFERENCES servises (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F84419EB6921 FOREIGN KEY (client_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment_team ADD CONSTRAINT FK_D7236EDEE5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment_team ADD CONSTRAINT FK_D7236EDE296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE appointment_id_seq CASCADE');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844AD23A45A');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F84419EB6921');
        $this->addSql('ALTER TABLE appointment_team DROP CONSTRAINT FK_D7236EDEE5B533F9');
        $this->addSql('ALTER TABLE appointment_team DROP CONSTRAINT FK_D7236EDE296CD8AE');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE appointment_team');
    }
}
