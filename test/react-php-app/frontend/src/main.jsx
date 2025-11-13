import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App.jsx';

// Global styles for the test app
import './styles/base/reset.css';
import './styles/base/typography.css';
import './styles/theme/colors.css';
import './styles/theme/layout.css';

const rootElement = document.getElementById('root');

if (rootElement) {
	const root = ReactDOM.createRoot(rootElement);

	root.render(
		<React.StrictMode>
			<App />
		</React.StrictMode>
	);
}
