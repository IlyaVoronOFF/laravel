<?php foreach ($categoriesList as $key => $category) : ?>
   <div>
      <h2><a href="<?= route('category.showNews', ['id' => ++$key]) ?>"><?= $category['title'] ?></a></h2>
   </div>
<?php endforeach ?>