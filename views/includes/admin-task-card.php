<div class="task-card">
    <div class="task-card__header">
        <div>Name: <?= $task['name'] ?></div>
        <div>E-mail: <?= $task['email'] ?></div>
    </div>
    <div class="task-card__body">
        <div class="row">
            <div class="col-12">
                <textarea class="form-control"
                          rows="3"
                          id="text<?= $task['id'] ?>"><?= $task['text'] ?></textarea>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary btn-block" id="save-text-btn<?= $task['id'] ?>">Save</button>
            </div>
        </div>
    </div>
    <div class="task-card__footer">
        <div class="row justify-content-around">
            <?php if ($task['edited_by_admin']): ?>
                <div class="col-auto edited-by-admin">Edited by admin</div>
            <?php endif ?>
            <div class="col-auto">
                <button class="btn btn-primary btn-sm"
                        id="status-change<?= $task['id'] ?>">Change Status</button>
                <?php if ($task['status']): ?>
                    <span class="task-completed" id="status-info<?= $task['id'] ?>">Completed!</span>
                <?php else: ?>
                    <span class="task-in-progress" id="status-info<?= $task['id'] ?>">In progress.</span>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>