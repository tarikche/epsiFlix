<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs
 */
final class Version20240604104037 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE Movie (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT DEFAULT NULL, release_year TEXT DEFAULT NULL, poster TEXT DEFAULT NULL, average_rating TEXT DEFAULT NULL)');
    }

    public function down(Schema $schema): void // Corrected 'public down' to 'public function down'
    {
        $this->addSql('DROP TABLE Movie');
    }
}

