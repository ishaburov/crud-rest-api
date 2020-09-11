<?php


namespace CrudRestApi\Console;


use CrudRestApi\Path;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;


class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'crud-rest-api:test';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Execute crud-rest-api test';

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
        $composerPath = Path::composerPath();

        $process = Process::fromShellCommandline("{$composerPath}/vendor/bin/phpunit  -c {$composerPath}/phpunit.xml --testdox");
        $process->run();

        $this->info($process->getOutput());
    }
}
