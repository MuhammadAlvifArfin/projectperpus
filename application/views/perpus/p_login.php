      



        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?= base_url('regform/'); ?>images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="<?= base_url('Login/registrasi') ?>" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form class="register-form" id="login-form" action="<?php echo site_url('login/dologin') ?>" method="post">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Username" autocomplete="off" required/>
                                
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password" required/>
                            </div>
                            <div>
                                <center>
                                        <?php
                                        if ($this->session->flashdata('error')!==null)
                                        {
                                        ?>
                                            <?php echo $this->session->flashdata('error') ?>
                                        <?php
                                        }
                                        ?>
                                </center>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
