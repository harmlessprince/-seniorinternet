<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;

class GenerateModelRepositoryCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        $className = $name . "Repository";
        $stub = parent::replaceClass($stub, $className);
        return $this->replaceModel($stub);
        // return str_replace(['dummy:command', '{{ class }}'], $this->option('name'), $stub);
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @return string
     */
    protected function replaceModel(string $stub): string
    {
        $name = $this->argument('name');
        $modelPath = $this->laravel['path'] . '/Models/' . $name . '.php';
        if (!$this->files->exists($modelPath)) {
            $this->error("Oops!,Model ${name} does not exist.");
            $this->error("You are not allowed to create repository for a model that does not exist.");
            exit();
        }
        return str_replace(['{{MODEL_NAME}}'], $this->argument('name'), $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $relativePath = '/stubs/repository.stub';
        return app_path() . '/Console' . $relativePath;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return 'App\Repositories\Eloquent\Repository';
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     * @return string
     */
    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        return $this->laravel['path'] . '/' . str_replace('\\', '/', $name) . 'Repository.php';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the Repository'],
        ];
    }
}
