<?php

namespace Graphicode\Features\Commands;

use Graphicode\Features\Stub;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputArgument;

class MigrateMakeCommand extends Command
{
    protected $name = "feature:make-migration";


    protected $description = "Create New Migration File";

    public function handle()
    {
        $name = $this->argument('name');
        $feature = $this->argument('feature');


        $filename         = now()->format('Y_m_d_hi') . '_' . $name;
        $featureStudly      = Str::studly($feature);
        $featurePath       = app_path("Features/$featureStudly");

        if (! File::exists($featurePath)) {
            $this->error("Feature [$feature] not found");
            return;
        }

        $filePath = "$featurePath/Migrations/$filename.php";
        if (File::exists($filePath)) {
            $this->error("File [$filePath] Already exists");
            return;
        }


        preg_match('/([a-zA-Z0-9]+)_([a-zA-Z0-9]+)_table$/', $filename, $matches);
        list($name, $type, $table) = $matches;

        $path = Stub::make("migration.$type", $filePath, [
            'table'     => $table
        ]);
        $this->info("Generate [$path] - DONE");
    }

    public function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of model'],
            ['feature', InputArgument::REQUIRED, 'The feature to create into'],
        ];
    }
}
