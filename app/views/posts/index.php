
  <p class="options">Estas registrado? <a href="<?php echo URLROOT; ?>/users/login">Ingresa a tu cuenta</a></p>


<div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/posts/create">
            Crea
        </a>
    <?php endif; ?>

    <?php foreach($data['posts'] as $post): ?>
        <div class="container-item">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id): ?>
                <a
                    class="btn orange"
                    href="<?php echo URLROOT . "/posts/update/" . $post->id ?>">
                    Update
                </a>
                <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="btn red">
                </form>
            <?php endif; ?>
            <div class="container signin">

  </div>

            <h2>
                <?php echo $post->title; ?>
            </h2>

            <p>
                <?php echo 'Creado el: ' . date('F j h:m', strtotime($post->created_at)) ?>
            </p>
            <p>
                <?php echo "Autor:" . $post->autor ?>
            </p>
            <p>
                <?php echo $post->body ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>