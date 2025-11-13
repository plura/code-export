import React from 'react';

const TodoEmptyState = () => {
	return (
		<div className="todo-empty">
			<p className="todo-empty__title">No todos yet</p>
			<p className="todo-empty__text">
				This is a static example used for testing the code-export tool. In a real project you would start by creating a new item.
			</p>
		</div>
	);
};

export default TodoEmptyState;
