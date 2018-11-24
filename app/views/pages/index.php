<?php require_once  APPROOT.'/views/includes/header.php'; ?>

   <h1>Welcome</h1>
   <?php echo $data['title']; ?>
   <br/>
   <?php echo APPROOT; ?>
   <h3><?php echo URLROOT; ?></h3>
   <h3><?php echo SITENAME; ?></h3>

   <ul>
      <?php foreach( $data['posts'] as $post ) : ?>
         <li><?php echo $post->post_body; ?></li>
      <?php endforeach;  ?>
   </ul>

<?php require_once  APPROOT.'/views/includes/footer.php'; ?>
