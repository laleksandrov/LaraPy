<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

if (!function_exists('python_path')) {
    /**
     * Generate a path to the Python scripts directory in resources.
     *
     * @param  string|null  $path
     * @return string
     */
    function python_path($path = '')
    {
        return resource_path('python' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }
}

if (!function_exists('python')) {
    /**
     * Execute a Python script with optional arguments.
     *
     * @param  string  $script  The script name (e.g., 'script.py').
     * @param  array   $args    The arguments to pass to the Python script.
     * @return string  The script output.
     *
     * @throws ProcessFailedException If the process fails.
     */
    function python($script, array $args = [])
    {
        // Build the full script path
        $scriptPath = python_path($script);

        // Add "python" executable and script path to the command
        $command = array_merge(['python', $scriptPath], $args);

        // Create and run the process
        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            // Throw exception if the process fails
            throw new ProcessFailedException($process);
        }

        // Return the process output
        return $process->getOutput();
    }
}