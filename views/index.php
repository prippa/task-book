<div class="container">

    <div class="row justify-content-center">
        <div class="col-12"><h4>Sort</h4></div>
        <div class="col-auto my-3">
            <span>Name</span>
            <a href="/sort/name/up" class="btn btn-primary btn-sm sort-link">↑</a>
            <a href="/sort/name/down" class="btn btn-primary btn-sm sort-link">↓</a>
        </div>
        <div class="col-auto my-3">
            <span>E-mail</span>
            <a href="/sort/email/up" class="btn btn-primary btn-sm sort-link">↑</a>
            <a href="/sort/email/down" class="btn btn-primary btn-sm sort-link">↓</a>
        </div>
        <div class="col-auto my-3">
            <span>Status</span>
            <a href="/sort/status/up" class="btn btn-primary btn-sm sort-link">↑</a>
            <a href="/sort/status/down" class="btn btn-primary btn-sm sort-link">↓</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12"><h4>Tasks</h4></div>
        <?php foreach ($data['tasks'] as $task): ?>
            <div class="col-lg-4 my-lg-0 my-3">
                <?php if ($data['is_admin']): ?>
                    <?php require 'views/includes/admin-task-card.php' ?>
                <?php else: ?>
                    <?php require 'views/includes/employee-task-card.php' ?>
                <?php endif ?>
            </div>
        <?php endforeach ?>
    </div>

    <!--Pagination-->
    <div class="row justify-content-center mt-4">
        <?php for ($i = 1; $i <= $data['pagination']['pages']; ++$i): ?>
            <div class="col-auto">
                <a class="pagination-numbers <?= $data['pagination']['active_page'] == $i ? 'active-page' : '' ?>"
                   href="<?= $data['pagination']['url'] ?>page/<?= $i ?>"><?= $i ?></a>
            </div>
        <?php endfor ?>
    </div>
</div>

<!--Scripts-->
<?php if ($data['is_admin']): ?>
<script type="text/javascript" src="/template/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    window.tasks = <?= json_encode($data['tasks']) ?>;
</script>
<script type="text/javascript" src="/template/js/admin_features.js"></script>
<?php endif ?>
