# LaraPy
LaraPy is a Laravel package designed to make managing and executing Python scripts seamless. It provides helper functions to simplify referencing Python scripts in your Laravel project and executing them with arguments.
## Features
- `python_path()`: Resolve the absolute path to Python scripts located in `resources/python`.
- `python($script, $args = [])`: Execute Python scripts and pass arguments dynamically.

## Installation
1. Install LaraPy via Composer:
``` bash
   composer require laleksandrov/larapy
```
1. After installing, the package automatically creates the directory `resources/python`, where your Python scripts should be placed. If the directory does not exist, create it manually:
``` bash
   mkdir -p resources/python
```
## Usage
### Referencing Python Scripts
LaraPy provides the `python_path()` helper to get the absolute path of a Python script within `resources/python`.
#### Example:
``` php
$scriptPath = python_path('example.py');

// Output: /absolute/path/to/resources/python/example.py
```
### Executing Python Scripts
LaraPy allows you to execute Python scripts using the `python()` helper. You can pass arguments as an array.
#### Example:
If you have a script called `example.py` in `resources/python`:
``` python
# example.py
import sys

if len(sys.argv) > 1:
    print(f"Arguments received: {', '.join(sys.argv[1:])}")
else:
    print("No arguments provided.")
```
Run the script with arguments in PHP:
``` php
$output = python('example.py', ['arg1', 'arg2']);
echo $output;

// Output: Arguments received: arg1, arg2
```
#### Error Handling:
If the script fails, the helper throws a `Symfony\Component\Process\Exception\ProcessFailedException`. You can handle this exception as follows:
``` php
try {
    $output = python('example.py', ['arg1']);
    echo $output;
} catch (ProcessFailedException $e) {
    echo $e->getMessage();
}
```
## Troubleshooting
1. **`resources/python` Directory Missing?**
If the `resources/python` folder wasn't automatically created during installation, you can manually create it:
``` bash
   mkdir -p resources/python
```
1. **Python Not Found?**
Ensure Python is installed on your system and accessible via the `python` command. If your environment uses `python3`, update the `python()` helper's command to use `python3`.

## Requirements
- PHP version `^8.0`
- Laravel version `^10.0`
- Python installed and accessible in your environment

## Contributing
We welcome contributions! To contribute:
1. Fork this repository.
2. Implement your feature or bugfix in a new branch.
3. Submit a Pull Request.

## Author
- **laleksandrov** ([GitHub Profile](https://github.com/laleksandrov))

## License
This package is licensed under the [MIT license](LICENSE).
