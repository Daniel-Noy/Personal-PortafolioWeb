<main class="login || container-sm">
    <form method="POST" class="form">
        <?php include_once __DIR__ . '/../templates/alerts.php'; ?>
        <div class="form__field">
            <label for="email">Email</label>
            <input
            type="text"
            name="email"
            id="name"
            class="form__input"
            placeholder="Nombre"
            >
        </div>

        <div class="form__field">
            <label for="password">Contraseña</label>
            <input
            type="password"
            name="password"
            id="password"
            class="form__input"
            placeholder="Contraseña"
            >
        </div>

        <input class="form__submit || button button__secondary" type="submit" value="Inicia Sesión">
    </form>
</main>