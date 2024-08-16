<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
</head>
<body>
    <h1>Recommended Books</h1>
    <?php
        $books = [
            "Atomic Habits",
            "The 12 hour work week",
            "Power of Habit"
        ];
    ?>

    <ul>
        <?php
            foreach($books as $book) {
                echo "<li>{$book}™</li>";
            }
        ?>

        <!--Shorthand-->
        <?php foreach($books as $book) : ?>
            <li><?php echo $book; ?></li>
        <?php endforeach; ?>

        <!--Shorthand-->
        <?php foreach($books as $book) : ?>
            <li><?= $book ?></li>
        <?php endforeach; ?>

    </ul>

    <!--Associative Array-->
    <h2>Books Info</h2>
    
    <?php 
        $books = [
            [
                'name' => 'Atomic Habits',
                'releasedYear' => 2018,
                'author' => 'James Clear',
                'purchaseUrl' => 'https://www.amazon.com/Atomic-Habits-James-Clear-audiobook/dp/B07RFSSYBH'
            ],
            [
                'name' => 'Whispers in the Wind',
                'releasedYear' => 2022,
                'author' => 'Samantha Harper',
                'purchaseUrl' => 'https://www.amazon.com/Whispers-Wind-Samantha-Harper/dp/0593136487'
            ],
            [
                'name' => 'The 12 Week Year',
                'releasedYear' => 2019,
                'author' => 'Brian Moran',
                'purchaseUrl' => 'https://www.amazon.com/12-Week-Year-Others-Months/dp/1118509234'
            ],
            [
                'name' => 'The Power of Habit',
                'releasedYear' => 2012,
                'author' => 'Charles Duhigg',
                'purchaseUrl' => 'https://www.amazon.com/Power-Habit-What-Life-Business/dp/081298160X'
            ],
            [
                'name' => 'The Habit Journal',
                'releasedYear' => 2021,
                'author' => 'James Clear',
                'purchaseUrl' => 'https://www.amazon.com/Habit-Journal-Guided-Principles-Productivity/dp/0593136487'
            ],
            [
                'name' => 'Echoes of Eternity',
                'releasedYear' => 2023,
                'author' => 'Michael J. Sullivan',
                'purchaseUrl' => 'https://www.amazon.com/Echoes-Eternity-Michael-Sullivan/dp/0593136487'
            ],
            [
                'name' => 'The Forgotten Chronicles',
                'releasedYear' => 2021,
                'author' => 'A.L. Mengel',
                'purchaseUrl' => 'https://www.amazon.com/Forgotten-Chronicles-Mengel/dp/0593136487'
            ],
            [
                'name' => 'Shadows of the Past',
                'releasedYear' => 2022,
                'author' => 'Patricia Bradley',
                'purchaseUrl' => 'https://www.amazon.com/Shadows-Past-Patricia-Bradley/dp/0593136487'
            ],
            [
                'name' => 'The Silent Symphony',
                'releasedYear' => 2024,
                'author' => 'Ella Winters',
                'purchaseUrl' => 'https://www.amazon.com/Silent-Symphony-Ella-Winters/dp/0593136487'
            ],
            [
                'name' => 'A Journey Beyond Stars',
                'releasedYear' => 2023,
                'author' => 'C.J. Cherryh',
                'purchaseUrl' => 'https://www.amazon.com/Journey-Beyond-Stars-CJ-Cherryh/dp/0593136487'
            ],
            [
                'name' => 'The Last Ember',
                'releasedYear' => 2020,
                'author' => 'Daniel Levin',
                'purchaseUrl' => 'https://www.amazon.com/Last-Ember-Daniel-Levin/dp/0593136487'
            ],
            [
                'name' => 'Voices of the Void',
                'releasedYear' => 2023,
                'author' => 'Adrian Tchaikovsky',
                'purchaseUrl' => 'https://www.amazon.com/Voices-Void-Adrian-Tchaikovsky/dp/0593136487'
            ],
            [
                'name' => 'Beneath the Crimson Sky',
                'releasedYear' => 2021,
                'author' => 'Mark Sullivan',
                'purchaseUrl' => 'https://www.amazon.com/Beneath-Crimson-Sky-Mark-Sullivan/dp/0593136487'
            ],
            [
                'name' => 'Fragments of Fate',
                'releasedYear' => 2024,
                'author' => 'Sierra Simone',
                'purchaseUrl' => 'https://www.amazon.com/Fragments-Fate-Sierra-Simone/dp/0593136487'
            ]
        ];
        

        // Generic Function
        // function filter($items, $key, $value) {
        //     $filtered = [];

        //     foreach($items as $item) {
        //         if($item[$key] === $value) {
        //             $filtered[] = $item;
        //         }
        //     }

        //     return $filtered;
        // }

        // What if I want to filter books by released year which is greater than or equal to 2023?
        function filter($items, $fn) {
            $filtered = [];

            foreach($items as $item) {
                if($fn($item)) {
                    $filtered[] = $item;
                }
            }

            return $filtered;
        }

        $filteredBooks = array_filter($books, function($book) { //array_filter is a built-in function to filter elements of an array using a callback function. 
            return $book['releasedYear'] < 2023;
        });
    ?>
    <ul>
       <?php foreach($books as $book) : ?>
        <?php 
            if($book['author'] === 'James Clear') {
                echo "<li>{$book['name']} by {$book['author']} Released Year - {$book['releasedYear']} <a href='{$book['purchaseUrl']}'>Purchase</a></li>";
            }
        ?>
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