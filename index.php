<?php include 'view/header.php';
require('model/database_igri.php');
$tipovi=zemi_tipovi_igri();
?>

<a href="igri/index.php?action=show_add_igra">Dodadi igra</a>
        <ul>
        <?php foreach ($tipovi as $tip) : ?>
            <li>
            <a href="igri/index.php?tip_id=<?php echo $tip['tip_id']; ?>">
                <?php echo $tip['tip_ime']; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

