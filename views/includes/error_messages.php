<?php if (!empty($this->errors)) : ?>
    <div class="message-box">
        <ul class="error-list">
            <?php foreach ($this->errors as $error) : ?>
                <li class="error-item"><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
