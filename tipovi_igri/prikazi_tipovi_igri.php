<?php include '../view/header.php'; ?>

<ul>
        <?php foreach ($tipovi as $tip) : ?>
            <li>
            <a href="../igri/index.php?tip_id=<?php echo $tip['tip_id']; ?>">
                <?php echo $tip['tip_ime']; ?>
            </a>
            </li>
        <?php endforeach; ?>
</ul>