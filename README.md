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
			"ext": ["php", "js", "jsx", "ts", "tsx", "css", "scss", "html", "json"],
			"follow_symlinks": false,
			"max_bytes": 500000,
			"allow_binary": false,
			"split_bytes": 0
		}
	]
}
```

Run all jobs in a batch file:

```sh
php src/code-export.php --mode=concat --batch=concat-jobs.example.json
```

---

## Options

The most relevant CLI options supported by `code-export` are:

| Option              | Description                                             |
| ------------------- | ------------------------------------------------------- |
| `--mode=`           | Operation mode: `concat` or `tree`.                     |
| `--source=`         | Directory to scan.                                      |
| `--output=`         | Output file path.                                       |
| `--exclude_paths=`  | Comma-separated paths to skip.                          |
| `--ext=`            | Array of file extensions to include (concat mode only). |
| `--max_bytes=`      | Skip files larger than this size (bytes).               |
| `--allow_binary`    | Allow binary files in concat output.                    |
| `--split_bytes=`    | Split output into chunks of this size (bytes).          |
| `--follow_symlinks` | Whether to follow symlinked directories.                |
| `--job=`            | Run a specific job inside a batch.                      |
| `--batch=`          | Path to a JSON batch file defining one or more jobs.    |

---

## Example test project

This repository includes a small React + PHP example app under `test/react-php-app/`.
It exists only to provide a realistic project structure for `code-export`.

The config files under `test/code-export-config/` define example jobs for concatenation and directory trees.

### Concat jobs

Defined in `test/code-export-config/concat-jobs.example.json`:

* `frontend-code` – concatenates the React JS/JSX files
* `frontend-styles` – concatenates all CSS under the React app
* `backend-only` – concatenates the PHP backend source

Run them with:

```sh
php src/code-export.php --mode=concat --batch=test/code-export-config/concat-jobs.example.json
```

### Tree jobs

Defined in `test/code-export-config/tree-jobs.example.json`:

* `full-tree` – directory tree of the entire example app
* `backend-tree` – directory tree of the backend only

Run them with:

```sh
php src/code-export.php --mode=tree --batch=test/code-export-config/tree-jobs.example.json
```

Outputs are written into `test/output/`.

---

## Changelog

For a list of changes and release notes, see [CHANGELOG.md](./CHANGELOG.md).

---

## License

MIT License
Copyright © Plura