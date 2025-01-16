<?php

/**
 * @author ShulkerStudio
 */

namespace core;

use pocketmine\plugin\PluginBase;
use refaltor\efficiencySql\EfficiencySQL;

require dirname(__DIR__).'/../vendor/autoload.php';

class Main extends PluginBase
{
    public function onEnable(): void
    {
        $this->enableSql();
    }

    /**
     * Function qui va charger le SQL
     * avec les migrations.
     * Sleep de 3 secondes pour attendre que la database
     * s'allume correctement.
     */
    public function enableSql(): void
    {
        sleep(3);
        EfficiencySQL::createConnection(
            $_ENV['PM_DB_HOST'],
            $_ENV['PM_DB_USER'],
            $_ENV['PM_DB_PASSWORD'],
            $_ENV['PM_DB_NAME'],
            __DIR__ . '/sql/migrations',
            'FRESH'
        );

        if ($_ENV['PM_MODE'] === 'DEV') {
            EFficiencySQL::fresh();
            EfficiencySQL::migrate();
        }
        EfficiencySQL::chargeCaches();
    }
}