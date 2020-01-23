<?php if (!empty($this->success)) : ?>
    <div class="message-box">
        <ul class="success-list">
            <?php foreach ($this->success as $success) : ?>
                <li class="success-item"><?= $success ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
