# code-export

A CLI tool to export a codebase into AI-friendly text files.  
Supports file concatenation, directory tree generation, filtering by extension, excluding paths, size limits, and batch JSON jobs.  
Useful for reviewing or analysing entire projects without manually copying files.

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
- Works with PHP directly, inside DDEV, Docker, or any environment

---

## Basic Usage

### Concat mode

```sh
php code-export.php \
    --mode=concat \
    --source=./src \
    --output=./export/src.txt
````

### Directory tree

```sh
php code-export.php \
    --mode=tree \
    --source=. \
    --output=./export/tree.txt
```

---

## Batch JSON Jobs

Example `concat-jobs.example.json`:

```json
{
    "jobs": [
        {
            "source": "./backend",
            "output": "./export/backend.txt",
            "exclude_paths": ["node_modules", "vendor"],
            "ext": "php,js,ts,jsx,tsx,css,scss,html,md",
            "follow_symlinks": false,
            "max_bytes": 2000000,
            "allow_binary": false,
            "split_bytes": 120000
        }
    ]
}
```

Run it:

```sh
php code-export.php --batch=concat-jobs.example.json
```

---

## Options

| Option              | Description                            |
| ------------------- | -------------------------------------- |
| `--mode=`           | `concat` or `tree`                     |
| `--source=`         | Directory to scan                      |
| `--output=`         | Output file path                       |
| `--exclude_paths=`  | Comma-separated paths to skip          |
| `--ext=`            | Allowed extensions (`php,js,ts,...`)   |
| `--max_bytes=`      | Skip files larger than this size       |
| `--allow_binary`    | Enable or disable binary file handling |
| `--split_bytes=`    | Split output into chunks of this size  |
| `--follow_symlinks` | Follow symlinked directories           |
| `--job=`            | Run a single job from a batch file     |
| `--batch=`          | Execute all jobs in a JSON file        |

---

## Example: DDEV Usage

```sh
ddev php code-export.php --mode=concat --source=./src --output=./export/src.txt
```

---

## Suggested Repository Structure

```
code-export/
    code-export.php
    concat-jobs.example.json
    tree-jobs.example.json
    README.md
```

---

## License

MIT License
Copyright © Plura