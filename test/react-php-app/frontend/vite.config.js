import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

// Vite config for the test React frontend.
// This file only exists to make the test project look realistic for code-export.

export default defineConfig({
	plugins: [
		react()
	],
	root: '.',
	build: {
		outDir: 'dist',
		emptyOutDir: true
	},
	server: {
		port: 5173
	},
	resolve: {
		alias: {
			'@': '/src'
		}
	}
});
