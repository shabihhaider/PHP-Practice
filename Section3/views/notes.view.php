<?php require('views/partials/head.php') ?>
<?php include('partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p>Hello, This is a Notes Page.</p>

    <?php foreach($notes as $note) : ?>
      <li>
        <a href="/note?<?= $note['id'] ?>" class="text-blue-500 hover:underline">
          <?= $note['body'] ?>
        </a>
      </li>
    <?php endforeach; ?>

  </div>
</main>

<?php require('views/partials/footer.php') ?>