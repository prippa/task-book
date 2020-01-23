<div class="container">

    <?php require 'views/includes/error_messages.php' ?>
    <?php require 'views/includes/success_messages.php' ?>

    <form action="/create_new_task" method="post">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="name-field">Name</label>
                <input type="text" class="form-control" id="name-field"
                       name="name" required tabindex="1" value="<?= $data['name'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="email-field">Email address</label>
                <input type="email" class="form-control" id="email-field"
                       name="email" required tabindex="2" value="<?= $data['email'] ?>">
            </div>

            <div class="form-group col-12">
                <label for="text-field">Task Text</label>
                <textarea class="form-control" id="text-field" rows="3"
                          name="text" required tabindex="3"><?= $data['text'] ?></textarea>
            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-block" tabindex="4" id="form-submit-btn">
            Create
        </button>
    </form>

</div>