<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main class="main-content">
  <div class ="pjax-container">
    <section class="section-body">
        
        <div class="grap" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </section>
    <?php $this->need('comments.php'); ?>

</main><!-- end #main-->
</div>

<?php $this->need('footer.php'); ?>
