import { useContext } from 'react';
import { TodoContext } from '../context/TodoContext.jsx';

// Small convenience hook around the TodoContext.
// In a real app you might fetch todos from the backend here.
//
// For the purposes of the test project, the data is static and lives in the provider.

export const useTodos = () => {
	const context = useContext(TodoContext);

	if (!context) {
		throw new Error('useTodos must be used within a TodoProvider');
	}

	return context;
};
