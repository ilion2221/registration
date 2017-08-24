<?php include ROOT . '/views/layouts/header.php'; ?>

    <section class="container">
        <div class="data-user">
            <h2>Привіт, <?php echo $hello ?>:)</h2>
            <?php if (!$userId): ?>
                <h4>Будь ласка, зареєструйтесь, або увійдіть! </h4>
                <h4>Реєстрація і вхід знаходяться у правому верхньому куті! </h4>
            <?php else: ?>
                <h4>Твій Email: <?php echo $user['email'] ?> </h4>
                <h4>Твій пароль: <?php echo $user['password'] ?> </h4>
                <h3 class='luck'>Гарного дня:)</h3>
            <?php endif; ?>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>