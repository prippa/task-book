<div class="task-card">
    <div class="task-card__header">
        <div>Name: <?= $task['name'] ?></div>
        <div>E-mail: <?= $task['email'] ?></div>
    </div>
    <div class="task-card__body">
        <div><?= htmlspecialchars($task['text']) ?></div>
    </div>
    <div class="task-card__footer">
        <div class="row justify-content-around">
            <?php if ($task['edited_by_admin']): ?>
                <div class="col-auto edited-by-admin">Edited by admin</div>
            <?php endif ?>
            <?php if ($task['status']): ?>
                <div class="col-auto task-completed">Completed!</div>
            <?php else: ?>
                <div class="col-auto task-in-progress">In progress.</div>
            <?php endif ?>
        </div>
    </div>
</div>