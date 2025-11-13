import React from 'react';
import TodoItem from './TodoItem.jsx';
import TodoEmptyState from './TodoEmptyState.jsx';
import { useTodos } from '../../hooks/useTodos.js';

const TodoList = () => {
	const { todos, toggleTodo, removeTodo } = useTodos();

	if (!todos || todos.length === 0) {
		return <TodoEmptyState />;
	}

	return (
		<ul className="todo-list">
			{todos.map((todo) => (
				<TodoItem
					key={todo.id}
					todo={todo}
					onToggle={() => toggleTodo(todo.id)}
					onRemove={() => removeTodo(todo.id)}
				/>
			))}
		</ul>
	);
};

export default TodoList;
