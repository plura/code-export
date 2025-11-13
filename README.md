# code-export

`code-export` is a CLI tool that exports a codebase into AI-friendly text files.

It can concatenate files into a single text output, generate directory trees, filter by extension, exclude paths, enforce size limits, and run multiple jobs defined in JSON. The main goal is to make it easy to feed an entire project (or part of it) into AI tools without manually copying files.

---

## Features

- Concatenate files from any folder into a single text output
- Generate a directory tree as a text file
- Filter by file extension
- Exclude specific paths or folders
- Skip large or binary files
- Optionally split the output file by size
- Follow or ignore symlinks
- Run multiple jobs defined in a JSON batch file
- Works with PHP directly, inside DDEV, Docker, or any PHP-capable environment

---

## Requirements

- PHP 8.0 or later (CLI)
- Access to the project files you want to export

No additional PHP extensions are required for basic usage.

---

## Installation

Clone the repository:

```sh
git clone https://github.com/plura/code-export.git
cd code-export
````

The main script lives in `src/code-export.php`. You can run it directly with `php`:

```sh
php src/code-export.php --help
```

(If you place the script elsewhere or rename it, adjust the paths in the examples below.)

---

## Basic usage

### Concat mode

Concatenate files under a directory into a single text file:

```sh
php src/code-export.php \
	--mode=concat \
	--source=./some-project \
	--output=./export/project.concat.txt
```

### Directory tree mode

Generate a directory tree as text:

```sh
php src/code-export.php \
	--mode=tree \
	--source=./some-project \
	--output=./export/project.tree.txt
```

You can combine these outputs when sending a project to an AI tool: the tree gives an overview, and the concatenated file provides the actual code.

---

## Batch JSON jobs

Instead of passing all options via CLI, you can define multiple jobs in a JSON file and run them in one go.

Example `concat-jobs.example.json`:

```json
{
	"jobs": [
		{
			"name": "example-job",
			"source": "./some-project",
			"output": "./export/project.concat.txt",
			"exclude_paths": ["node_modules", "vendor", "dist"],
			"ext": "php,js,jsx,ts,tsx,css,scss,html,json",
			"follow_symlinks": false,
			"max_bytes": 500000,
			"allow_binary": false,
			"split_bytes": 0
		}
	]
}
```

Run all jobs in the file:

```sh
php src/code-export.php --batch=concat-jobs.example.json
```

You can also target a single job in the batch file using `--job=NAME` if the script supports it.

---

## Options

The most relevant CLI options supported by `code-export` are:

| Option              | Description                                                                              |
| ------------------- | ---------------------------------------------------------------------------------------- |
| `--mode=`           | Operation mode: `concat` or `tree`.                                                      |
| `--source=`         | Directory to scan.                                                                       |
| `--output=`         | Output file path for the generated text.                                                 |
| `--exclude_paths=`  | Comma-separated paths to skip (relative to `source`).                                    |
| `--ext=`            | Comma-separated list of file extensions to include (for concat).                         |
| `--max_bytes=`      | Skip individual files larger than this size (in bytes).                                  |
| `--allow_binary`    | Whether to allow binary files in concat output.                                          |
| `--split_bytes=`    | If greater than zero, split the concatenated output into chunks of this size (in bytes). |
| `--follow_symlinks` | Whether to follow symlinked directories.                                                 |
| `--job=`            | Optional job name when using `--batch`.                                                  |
| `--batch=`          | Path to a JSON file describing one or more jobs.                                         |

Not all options are required for every mode. When using batch JSON files, most of these values are taken from the JSON instead of CLI arguments.

---

## Example test project

This repository includes a small React + PHP example app under `test/react-php-app/`.

It exists only to provide a realistic project structure for `code-export`, with nested folders, multiple file types, and a simple frontend/backed split.

The JSON configuration files under `test/code-export-config/` define a few example jobs:

* `concat-jobs.example.json`

  * `frontend-only`: concatenate only the React frontend files
  * `backend-only`: concatenate only the PHP backend files
  * `full-react-php-app`: concatenate both frontend and backend, with output splitting enabled

* `tree-jobs.example.json`

  * `full-tree`: directory tree for the entire example app
  * `backend-tree`: directory tree for the backend only

Assuming the CLI script is at `src/code-export.php`, you can run:

```sh
php src/code-export.php --batch=test/code-export-config/concat-jobs.example.json

php src/code-export.php --batch=test/code-export-config/tree-jobs.example.json
```

The outputs are written into `test/output/` by default (you may need to create this directory the first time).

---

## License

MIT License
Copyright © Plura