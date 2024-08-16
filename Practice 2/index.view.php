<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
</head>
<body>
    <h1>Recommended Books</h1>

    <ul>
        <?php foreach($books as $book) : ?> 
           <li><?= $book['name'] ?></li>
        <?php endforeach; ?>

        <!--Shorthand-->
        <?php foreach($books as $book) : ?>
            <li><?= $book['name'] ?></li>
        <?php endforeach; ?>

    </ul>

    <!--Associative Array-->
    <h2>Books Info</h2>
    
    
    <ul>
       <?php foreach($books as $book) : ?>
        <?php if($book['author'] === 'James Clear') : ?>
            <li><?= $book['name'] ?> by <?= $book['author']?> Released Year - <?= $book['releasedYear']?> <a href="<?= $book['purchaseUrl'] ?>">Purchase</a></li>
        <?php endif; ?>
       <?php endforeach; ?>

       <!--Shorthand-->

       <?php foreach($books as $book) : ?>
        <?php if($book['author'] == 'James Clear') : ?>
            <li>
                <?= $book['name'] ?> by <?= $book['author'] ?> Released Year <?= $book['releasedYear'] ?> <a href="<?= $book['purchaseUrl'] ?>">Purchase</a>
            </li>
            <?php endif;?>
       <?php endforeach; ?>
    </ul>
    

    <!--Functions and Filters-->
    <ul>
        <?php foreach($filteredBooks as $book) : ?>
            <li>
                <?= $book['name'] ?> - BY <?= $book['author'] ?> Released Year <?= $book['releasedYear'] ?> <a href="<?= $book['purchaseUrl'] ?>">Purchase</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!--Example of Function and Filter-->
    
    <ul>
        <?php foreach($filteredBooks as $book) : ?>

            <li>
                <?= $book['name'] ?> - BY <?= $book['author'] ?> Released year <?= $book['releasedYear'] ?> <a href="<?= $book['purchaseUrl'] ?>">Purchase</a>
            </li>
        <?php endforeach; ?>
    </ul>


</body>
</html>