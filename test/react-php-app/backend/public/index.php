<?php

// This is a simple front controller for the PHP backend.
// In a real project this might serve HTML or bootstrap a framework.
//
// For this test app we simply return a small HTML page that explains
// this backend is here only to support the code-export examples.

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PHP Backend · React + PHP Test App</title>
	</head>
	<body>
		<h1>PHP Backend</h1>
		<p>
			This is a minimal PHP backend used as part of the React + PHP test app. It exists only
			to provide realistic-looking PHP code and folder structure for the <code>code-export</code> tool.
		</p>
		<p>
			Try the JSON endpoints:
		</p>
		<ul>
			<li><code>/public/api.php?endpoint=health</code></li>
			<li><code>/public/api.php?endpoint=todos</code></li>
		</ul>
	</body>
</html>
