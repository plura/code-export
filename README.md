# code-export

`code-export` is a CLI tool that exports a codebase into AI-friendly text files.

It can concatenate files into a single text output, generate directory trees, filter by extension, exclude paths, enforce size limits, and run multiple jobs defined in JSON. The main goal is to make it easy to feed an entire project (or part of it) into AI tools without manually copying files.

---

## Features

- Concatenate files from any folder into a single text file  
- Generate a directory tree as text  
- Filter by file extension  
- Exclude specific paths or folders  
- Skip large or binary files  
- Optional split-output by size  
- Follow or ignore symlinks  
- JSON batch jobs for multi-export pipelines  
- Works with PHP CLI directly or inside DDEV/Docker  
- Global Windows command support (optional)

---

## Requirements

- PHP 8.0 or later (CLI)
- Access to the project files you want to export

---

## Installation

Clone the repository:

```sh
git clone https://github.com/plura/code-export.git
cd code-export
````

The main script lives in `src/code-export.php`.
You can run it directly:

```sh
php src/code-export.php --help
```

---

## Optional: global Windows command

If you want to run `code-export` from **any** project folder on Windows, you can set it up as a global command.

### 1. Install PHP (if needed)

If this fails:

```sh
php -v
```

then install PHP for Windows:

1. Download a recent x64 **Non Thread Safe** ZIP from [https://windows.php.net/download/](https://windows.php.net/download/)

2. Extract it into a folder such as:

   ```text
   C:\tools\php
   ```

3. Add that folder to your PATH
   (System Properties → Environment Variables → Path → Add `C:\tools\php`)

4. Open a new terminal and verify:

   ```sh
   php -v
   ```

### 2. Create a wrapper script

Create a directory for custom tools, for example:

```text
C:\tools\bin
```

Then create:

```text
C:\tools\bin\code-export.bat
```

with the following contents (adjust the path to your local clone):

```bat
@echo off
php "C:\Plura\dev\code\php\code-export\src\code-export.php" %*
```

Now add the folder that contains `code-export.bat` (for example `C:\tools\bin`) to your PATH:

1. Open System Properties → Environment Variables

2. Edit the `Path` variable (User or System)

3. Add a new entry, e.g.:

   ```text
   C:\tools\bin
   ```

4. Confirm all dialogs and open a **new** terminal

Verify that the command is visible:

```sh
code-export --help
```

If you see the help text, the global command is working.
If `code-export` is “not recognized”, check that:

* the `.bat` file is in the folder you added to PATH, and
* you opened a new terminal after changing PATH.

### 3. Using the global command

From any project:

```sh
code-export --mode=concat --source=./src --output=./export/app.concat.txt
```

Or with a local project-specific config:

```sh
code-export --mode=concat --batch=./code-export-config/concat-jobs.json
```

All paths are resolved **relative to the directory where you run the command**, not where the script lives.

---

## Basic usage

### Concat mode

```sh
php src/code-export.php \
    --mode=concat \
    --source=./some-project \
    --output=./export/project.concat.txt
```

### Directory tree mode

```sh
php src/code-export.php \
    --mode=tree \
    --source=./some-project \
    --output=./export/project.tree.txt
```

---

## Batch JSON jobs

You can define multiple jobs in a single JSON file and run them in one command.

Example `concat-jobs.example.json`:

```json
{
    "jobs": [
        {
            "name": "example-job",
            "source": "./some-project",
            "output": "./export/project.concat.txt",
            "exclude_paths": ["node_modules", "vendor", "dist"],
            "ext": ["php", "js", "jsx", "ts", "tsx", "css", "scss", "html", "json"],
            "follow_symlinks": false,
            "max_bytes": 500000,
            "allow_binary": false,
            "split_bytes": 0
        }
    ]
}
```

Run the batch file:

```sh
php src/code-export.php --mode=concat --batch=concat-jobs.example.json
```

---

## Options

| Option              | Description                                    |
| ------------------- | ---------------------------------------------- |
| `--mode=`           | Operation mode: `concat` or `tree`.            |
| `--source=`         | Directory to scan.                             |
| `--output=`         | Output file path.                              |
| `--exclude_paths=`  | Comma-separated list of directories to skip.   |
| `--ext=`            | Array of file extensions (concat mode only).   |
| `--max_bytes=`      | Skip files larger than this size (bytes).      |
| `--allow_binary`    | Allow binary files in output.                  |
| `--split_bytes=`    | Split output into chunks of this size (bytes). |
| `--follow_symlinks` | Follow symlinked directories.                  |
| `--job=`            | Run a specific job by name.                    |
| `--batch=`          | Path to a JSON batch file.                     |

---

## Example test project

A small React + PHP demo application lives under:

```text
test/react-php-app/
```

It exists so the repo contains real example structures for testing.

### Concat jobs

In:

```text
test/code-export-config/concat-jobs.example.json
```

It includes:

* `frontend-code`
* `frontend-styles`
* `backend-only`

Run them:

```sh
php src/code-export.php --mode=concat --batch=test/code-export-config/concat-jobs.example.json
```

### Tree jobs

In:

```text
test/code-export-config/tree-jobs.example.json
```

Run them:

```sh
php src/code-export.php --mode=tree --batch=test/code-export-config/tree-jobs.example.json
```

Outputs appear in `test/output/`.

---

## Changelog

See: [CHANGELOG.md](./CHANGELOG.md)

---

## License

MIT License
Copyright © Plura