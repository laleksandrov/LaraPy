<?php

namespace Laleksandrov\LaraPy;

use Illuminate\Support\ServiceProvider;

class PythonResourcesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Ensure "resources/python" directory exists
        $pythonDir = resource_path('python');
        
        if (!is_dir($pythonDir)) {
            mkdir($pythonDir, 0755, true);
        }

        // Optionally log if the directory was created
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Autoload helper functions
        require_once __DIR__ . '/Helpers/python_helper.php';
    }
}