import React from 'react';

const HomeHero = () => {
	return (
		<header className="hero hero--home">
			<div className="hero__content">
				<h1 className="hero__title">React + PHP Test App</h1>
				<p className="hero__subtitle">
					Used only as a realistic example project for the <code>code-export</code> tool.
				</p>
				<ul className="hero__list">
					<li>Nested React components and pages</li>
					<li>Simple todo context and hook</li>
					<li>PHP backend with a JSON API structure</li>
				</ul>
			</div>
		</header>
	);
};

export default HomeHero;
