<?php
require_once __DIR__ . "/product.php";
require_once __DIR__ . "/user.php";
require_once __DIR__ . "/animalFood.php";
require_once __DIR__ . "/animalGame.php";

$dog_food = new animalFood("Migliorcane", "bocconi", 1.50, "Cane");
$cat_food = new animalFood("Migliorgatto", "bocconi", 2, "Gatti");
$mouse_game = new animalGame("Giochi Preziosi", "giochi", 10, "plastica");

$user1 = new user("Mohamed", "hammaslima@gmail.com");
$user1->addShop($dog_food);

var_dump($user1);

$user2 = new user("Ludo", "ludoludo@libero.it");
$user2->card_expired = true;
$user2->addShop($cat_food);
$user2->addShop($mouse_game);

var_dump($user2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cibo Per Animali</title>
</head>

<body>
    <div>
        <h2>
            Prodotti Disponibili:
        </h2>
        <ul>
            <li> <?php echo $cat_food->printInfo(); ?> </li>
            <li> <?php echo $dog_food->printInfo(); ?> </li>
            <li> <?php echo $mouse_game->printInfo(); ?></li>
        </ul>
    </div>

    <!-- User not registered -->
    <div>
        <h2>
            Guest User
        </h2>
        <h4>
            <?php echo $user1->printUser(); ?>
        </h4>
        <h5>Il tuo carrello:</h5>
        <ul>
            <?php foreach ($user1->my_shop as $item) { ?>
                <li><?php echo $item->printInfo(); ?></li>
            <?php } ?>
        </ul>
        <h3>Totale: € <?php echo $user1->getSum(); ?></h3>
        <p>
            <?php
            if ($user1->validCard()) {
                echo "Procedi all'acquisto";
            } else {
                echo "La tua carta è scaduta";
            } ?>
        </p>
    </div>
    <div>
    <h3>Utente Registrato</h3>
      <h4><?php echo $user2->printUser(); ?></h4>
      <hr>
      
      <h2><?php echo $user2->registered(); ?></h2>
      <ul>
        <?php foreach($user2->my_shop as $item) { ?>
          <li><?php echo $item->printInfo(); ?></li>
        <?php } ?>
      </ul>
      <h3>Totale: € <?php echo $user2->getSum(); ?></h3>
      
      <p>
        <?php
        if ($user2->validCard()) {
          echo "Puoi procedere all'acquisto!";
        } else {
          echo "La tua carta è scaduta.";
        }?>
      </p>
      <hr>
    </div>
</body>

</html>