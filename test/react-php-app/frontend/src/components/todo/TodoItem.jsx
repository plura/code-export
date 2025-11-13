import React from 'react';

const TodoItem = ({ todo, onToggle, onRemove }) => {
	return (
		<li className="todo-item">
			<label className="todo-item__label">
				<input
					type="checkbox"
					checked={todo.completed}
					onChange={onToggle}
					className="todo-item__checkbox"
				/>
				<span className={todo.completed ? 'todo-item__text is-completed' : 'todo-item__text'}>
					{todo.title}
				</span>
			</label>

			<button
				type="button"
				className="todo-item__remove"
				onClick={onRemove}
			>
				Remove
			</button>
		</li>
	);
};

export default TodoItem;
