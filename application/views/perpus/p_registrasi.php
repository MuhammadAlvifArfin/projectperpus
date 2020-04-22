<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="post" class="register-form" action="<?= base_url('login/registrasi') ?>">

                    <div class="form-group">
                        <input type="text" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>" autocomplete="off">
                        <small class="text-danger"><?= form_error('nama') ?></small>
                    </div>

                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" autocomplete="off">
                        <small class="text-danger"><?= form_error('username') ?></small>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" value="<?= set_value('password') ?>" autocomplete="off">
                        <small class="text-danger"><?= form_error('password') ?></small>
                    </div>

                    <div class="form-group">
                        <input type="password" name="repass" placeholder="Re-Password" autocomplete="off">
                        <small class="text-danger"><?= form_error('repass') ?></small>
                    </div>

                    <div class="form-group form-button">
                                <input type="submit" class="form-submit">
                            </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="<?= base_url('regform/') ?>images/signup-image.jpg" alt="sing up image"></figure>
                <a href="<?= base_url('Login') ?>" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
