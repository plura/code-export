import React, { useState } from 'react';
import Header from './components/layout/Header.jsx';
import Footer from './components/layout/Footer.jsx';
import TodoList from './components/todo/TodoList.jsx';

import HomePage from './pages/home/HomePage.jsx';
import AboutPage from './pages/about/AboutPage.jsx';
import { TodoProvider } from './context/TodoContext.jsx';

import './styles/pages/home.css';
import './styles/pages/about.css';

const App = () => {
	const [activePage, setActivePage] = useState('home');

	const handleNavigate = (page) => {
		setActivePage(page);
	};

	const renderPage = () => {
		if (activePage === 'about') {
			return <AboutPage />;
		}

		// Default page is home
		return (
			<>
				<HomePage />
				<section className="app-section app-section--todos">
					<h2 className="app-section__title">Todos (Example Data From PHP API)</h2>
					<p className="app-section__intro">
						This list is hard-coded for the test project. In a real app, it could be loaded from the PHP backend.
					</p>
					<TodoList />
				</section>
			</>
		);
	};

	return (
		<TodoProvider>
			<div className="app-root">
				<Header onNavigate={handleNavigate} activePage={activePage} />

				<main className="app-main">
					{renderPage()}
				</main>

				<Footer />
			</div>
		</TodoProvider>
	);
};

export default App;
