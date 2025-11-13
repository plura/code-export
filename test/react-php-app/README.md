# React + PHP Test App

This is a small example project used to test the `code-export` tool.

It simulates a React SPA in the `frontend/` directory and a simple PHP API backend in the `backend/` directory. The goal is to provide a realistic structure for concatenation and tree exports.

## Structure

- `frontend/`  
  React app built with Vite, with nested components, pages, context, hooks and CSS.

- `backend/`  
  Small PHP backend with a public entry point, API controller, domain layer and database infrastructure.

## Usage

This project is not meant to run in production. It exists only as a realistic test target for `code-export`.

You can point your JSON jobs to `test/react-php-app/` to generate concatenated text or a directory tree for AI analysis.
