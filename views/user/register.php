<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <h2>Ви зареєстровані!</h2>
                        <div class="true-reg">
                            <a class="btn btn-success" href="/user/login">Увійти</a>
                            <br>
                            <br>
                            <a class="btn btn-primary" href="/">Головна</a>
                        </div>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="signup-form"><!--sign up form-->
                            <h2>Реєстрація на сайті</h2>
                            <form action="#" method="post">
                                <input class="form-control" type="text" name="login" placeholder="Логін"
                                       value="<?php echo $login; ?>"/>
                                <input class="form-control" type="email" name="email" placeholder="E-mail"
                                       value="<?php echo $email; ?>"/>
                                <input class="form-control"
                                       type="password" name="password" placeholder="Пароль"
                                       value=""/>
                                <input class="form-control" type="password" name="pass"
                                       placeholder="Підтвердження паролю:" value=""/>
                                <input type="submit" name="submit" class="btn btn-danger"
                                       value="Реєстрація"/>
                            </form>
                        </div><!--/sign up form-->

                    <?php endif; ?>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>