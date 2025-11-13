import React from 'react';

const AboutPage = () => {
	return (
		<section className="page page--about">
			<header className="page__header">
				<h1>About This Test Project</h1>
			</header>

			<div className="page__content">
				<p>
					This project is intentionally small and self-contained. It provides enough files and folder
					depth for <code>code-export</code> to generate meaningful concatenated output and a directory tree.
				</p>
				<p>
					You can experiment with different filters, exclusions and size limits without worrying
					about breaking a real application.
				</p>
				<p>
					The code is not meant to be production ready. It is simply a snapshot of a plausible
					React frontend and PHP backend, which makes it convenient as input for AI-assisted analysis.
				</p>
			</div>
		</section>
	);
};

export default AboutPage;
