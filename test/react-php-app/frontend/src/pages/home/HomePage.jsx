import React from 'react';
import HomeHero from './HomeHero.jsx';

const HomePage = () => {
	return (
		<section className="page page--home">
			<HomeHero />
			<div className="page__content">
				<p>
					This is a small React + PHP test application. It exists purely as sample code for the
					<code>code-export</code> tool, so the concatenated output resembles a real project.
				</p>
				<p>
					The frontend simulates a single-page application with a couple of routes and a todo list.
					The backend simulates a tiny JSON API written in PHP.
				</p>
			</div>
		</section>
	);
};

export default HomePage;
