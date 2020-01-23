<div class="container">

    <?php require 'views/includes/error_messages.php' ?>

    <form action="/login" method="post">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="login-field">Login</label>
                <input type="text" class="form-control" id="login-field"
                       name="login" required tabindex="1" value="<?= $data['login'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="password-field">Password</label>
                <input type="password" class="form-control" id="password-field"
                       name="password" required tabindex="2">
            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-block" tabindex="3" id="form-submit-btn">
            Login
        </button>
    </form>

</div>