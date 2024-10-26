<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create route name into database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes= Route::getRoutes();


        foreach($routes as $route)
        {



            if(str_contains($route->getPrefix(),'admin'))
            {

                Permission::create([
                    'name'=>str_replace("."," ",$route->getName()),
                    'slug'=>$route->getName()
                ]);

            }
        }

        echo "all permission store successfully";

    }
}
