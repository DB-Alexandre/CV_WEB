<?php
session_start();

// Définir la langue par défaut
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

// Charger les traductions
$lang = $_SESSION['lang'];
$translations = include "lang/$lang.php";
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $translations['title'] ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?= $translations['header']['name'] ?></h1>
        <p><?= $translations['header']['description'] ?></p>
    </header>
    <nav>
        <ul>
            <li><a href="#about"><?= $translations['menu']['about'] ?></a></li>
            <li><a href="#skills"><?= $translations['menu']['skills'] ?></a></li>
            <li><a href="#experience"><?= $translations['menu']['experience'] ?></a></li>
            <li><a href="#education"><?= $translations['menu']['education'] ?></a></li>
            <li><a href="#contact"><?= $translations['menu']['contact'] ?></a></li>
            <li class="language-switcher">
                <div class="dropdown">
                    <button class="dropbtn"><img id="selected-lang" src="images/<?= $lang ?>-flag.png" alt="Langue sélectionnée"></button>
                    <div class="dropdown-content">
                        <a href="#" onclick="changeLang('fr')"><img src="images/fr-flag.png" alt="Français"> Français</a>
                        <a href="#" onclick="changeLang('en')"><img src="images/en-flag.png" alt="English"> English</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <main>
        <section id="about">
            <h2><?= $translations['about']['title'] ?></h2>
            <p class="about-text"><?= $translations['about']['content'] ?></p>
        </section>
        <section id="skills">
            <h2><?= $translations['skills']['title'] ?></h2>
            <ul>
                <?php foreach ($translations['skills']['items'] as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>
            <h2><?= $translations['skills']['extra_title'] ?></h2>
            <ul>
                <?php foreach ($translations['skills']['extra_items'] as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>
            <h2><?= $translations['skills']['software_title'] ?></h2>
            <ul>
                <?php foreach ($translations['skills']['software_items'] as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section id="experience">
            <h2><?= $translations['experience']['title'] ?></h2>
            <?php foreach ($translations['experience']['jobs'] as $job): ?>
                <div class="job">
                    <h3><?= $job['title'] ?></h3>
                    <p><?= $job['location'] ?></p>
                    <p><?= $job['duration'] ?></p>
                    <?php if (isset($job['type'])): ?>
                        <p><?= $job['type'] ?></p>
                    <?php endif; ?>
                    <?php if (isset($job['additional'])): ?>
                        <p><?= $job['additional'] ?></p>
                    <?php endif; ?>
                    <?php if (isset($job['taches'])): ?>
                        <p><?= $job['taches'] ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
        <section id="education">
            <h2><?= $translations['education']['title'] ?></h2>
            <?php foreach ($translations['education']['degrees'] as $degree): ?>
                <p><?= $degree ?></p>
            <?php endforeach; ?>
        </section>
        <section id="contact">
            <h2><?= $translations['contact']['title'] ?></h2>
            <p><?= $translations['contact']['email'] ?>: <a href="mailto:alexandre.debrou.pro@gmail.com">alexandre.debrou.pro@gmail.com</a></p>
            <p><?= $translations['contact']['linkedin'] ?>: <a href="https://www.linkedin.com/in/alexandre-de-brou" target="_blank">linkedin.com/in/alexandre-de-brou</a></p>
            <p><?= $translations['contact']['github'] ?>: <a href="https://github.com/DB-Alexandre" taget="_blank">github.com/DB-Alexandre</p>
        </section>
    </main>
    <footer>
        <p><?= $translations['footer'] ?></p>
    </footer>
    <script>
        function changeLang(lang) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'change_lang.php?lang=' + lang, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    location.reload();
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
