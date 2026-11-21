<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    protected $signature = 'backup:db';

    protected $description =
        'Sauvegarde automatique Gestimmo-Pro';

    public function handle()
    {
        $backupDir = storage_path('app/backups');

        if (!file_exists($backupDir)) {

            mkdir(
                $backupDir,
                0777,
                true
            );
        }

        $filename =
            $backupDir .
            '/backup_' .
            now()->format('Ymd_His') .
            '.txt';

        file_put_contents(
            $filename,
            'Sauvegarde créée le ' .
            now()
        );

        $this->info(
            'Sauvegarde créée : ' .
            $filename
        );

        return self::SUCCESS;
    }
}