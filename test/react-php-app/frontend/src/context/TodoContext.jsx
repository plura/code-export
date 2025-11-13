import React, { createContext, useMemo, useState } from 'react';

export const TodoContext = createContext(null);

const createInitialTodos = () => {
	return [
		{
			id: 1,
			title: 'Review React components in this test app',
			completed: false
		},
		{
			id: 2,
			title: 'Inspect the PHP backend structure',
			completed: true
		},
		{
			id: 3,
			title: 'Experiment with code-export JSON job definitions',
			completed: false
		}
	];
};

export const TodoProvider = ({ children }) => {
	const [todos, setTodos] = useState(createInitialTodos);

	const toggleTodo = (id) => {
		setTodos((current) =>
			current.map((todo) =>
				todo.id === id
					? { ...todo, completed: !todo.completed }
					: todo
			)
		);
	};

	const removeTodo = (id) => {
		setTodos((current) => current.filter((todo) => todo.id !== id));
	};

	const value = useMemo(() => {
		return {
			todos,
			toggleTodo,
			removeTodo
		};
	}, [todos]);

	return (
		<TodoContext.Provider value={value}>
			{children}
		</TodoContext.Provider>
	);
};
