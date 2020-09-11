<?php


namespace CrudRestApi\Console;


use CrudRestApi\Path;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class MigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'crud-rest-api:migrate {arg?}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Execute crud-rest-api migrations';

    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $basePath = Path::migrationsPath();

        $appMigrationPath = config('crud.migration_dir', database_path()."/migrations");

        $arg = $this->argument('arg');
        if ($arg) {
            $arg = ":".$arg;
        }

        if (!is_dir($appMigrationPath)) {
            $this->info("Migrations created on {$appMigrationPath}");
        }
        File::copyDirectory($basePath, $appMigrationPath);

        $this->call("migrate{$arg}", ["--path" => 'database/migrations/crud']);
    }
}
