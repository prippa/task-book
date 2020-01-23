<header>
    <nav>
        <a class="<?= $path == 'index' ? 'active' : '' ?>" href="/">️Home</a>
        <a class="<?= $path == 'create_new_task' ? 'active' : '' ?>" href="/create_new_task">Create New Task</a>
        <?php if ($data['is_logged']): ?>
            <a href="/logout">Logout</a>
        <?php else: ?>
            <a class="<?= $path == 'login' ? 'active' : '' ?>" href="/login">Login</a>
        <?php endif ?>
    </nav>
</header>
