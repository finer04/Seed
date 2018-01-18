<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
.main-content{padding-left:60px;padding-right:60px;margin-bottom:42px;background-color:#fff;box-shadow:0 2px 2px 0 rgba(160,160,160,.16),0 1px 5px 0 rgba(160,160,160,.16);padding-bottom: 10px;}
.grap {padding-top: 20px;}
@media (max-width: 600px)
{.main-content {padding-left:30px;padding-right:30px;}}
.site-header {background-image: url(<?php showThumbnail($this); ?>);}
</style>

<main class="main-content">
    <section class="section-body">
        <div class="grap wow fadeIn" data-wow-delay="0.7s" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="post-tags"><?php $this->tags('', true, ''); ?></p>

    </section>
    <?php $this->need('comments.php'); ?>

</main><!-- end #main-->

<?php $this->need('footer.php'); ?>
