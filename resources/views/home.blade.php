
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accueil client</title>
	<style>
		body { font-family: Arial, sans-serif; background: #f7fafc; margin: 0; }
		.container { max-width: 400px; margin: 60px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #e2e8f0; padding: 32px; text-align: center; }
		h1 { color: #2d3748; font-size: 1.7em; margin-bottom: 18px; }
		.nav { margin-top: 24px; }
		.nav a { display: block; margin: 12px 0; padding: 10px 0; background: #4299e1; color: #fff; border-radius: 5px; text-decoration: none; font-weight: bold; transition: background 0.2s; }
		.nav a:hover { background: #2b6cb0; }
	</style>
</head>
<body>
	<div class="container">
		<h1>Bienvenue !</h1>
		<p>Accédez rapidement à vos tâches et à votre profil.</p>
		<div class="nav">
			<a href="{{ route('tasks.index') }}">Voir les tâches</a>
			<a href="{{ route('tasks.create') }}">Ajouter une tâche</a>
			<a href="{{ route('profile.edit') }}">Profil utilisateur</a>
		</div>
	</div>
</body>
</html>

