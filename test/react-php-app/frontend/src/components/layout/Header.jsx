import React from 'react';

const Header = ({ onNavigate, activePage }) => {
	const handleClick = (page) => (event) => {
		event.preventDefault();
		if (typeof onNavigate === 'function') {
			onNavigate(page);
		}
	};

	return (
		<header className="app-header">
			<div className="app-header__inner">
				<div className="app-header__brand">
					<span className="app-header__logo">React + PHP</span>
					<span className="app-header__subtitle">Test app for code-export</span>
				</div>

				<nav className="app-header__nav">
					<a
						href="#home"
						onClick={handleClick('home')}
						className={activePage === 'home' ? 'is-active' : ''}
					>
						Home
					</a>
					<a
						href="#about"
						onClick={handleClick('about')}
						className={activePage === 'about' ? 'is-active' : ''}
					>
						About
					</a>
				</nav>
			</div>
		</header>
	);
};

export default Header;
