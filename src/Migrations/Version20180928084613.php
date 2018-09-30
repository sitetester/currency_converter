<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180928084613 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite',
            'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE exchange_rate (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, from_currency VARCHAR(255) NOT NULL, to_currency VARCHAR(255) NOT NULL, exchange_rate NUMERIC(25, 18) NOT NULL, date DATETIME NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite',
            'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE exchange_rate');
    }
}
