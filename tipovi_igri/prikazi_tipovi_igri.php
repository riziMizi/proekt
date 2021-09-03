<?php include '../view/header.php'; ?>

<ul id="lista_tipovi">
        <?php foreach ($tipovi as $tip) : ?>
            <li id="li_tipovi">
            <a href="../igri/index.php?tip_id=<?php echo $tip['tip_id']; ?>">
                <?php echo $tip['tip_ime']; ?>
            </a>
            </li>
        <?php endforeach; ?>
</ul>
<?php include '../view/footer.php';?>