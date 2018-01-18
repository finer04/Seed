<?php
/**
 * @package Puma Depth-modify
 * @author Bigfa
 * @version 1.0.4
 * @link http://fatesinger.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<main class="main-content">
    <section class="blockGroup">
        <?php while($this->next()): ?>
            <article class="block block--inset block--list wow zoomIn" itemscope itemtype="http://schema.org/BlogPosting" >
                <h2 class="block-title post-featured" itemprop="headline">
                    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </h2>
                <div class="block-postMetaWrap u-textAlignCenter">
                    <time><?php $this->date('Y/m/d'); ?></time>
                    <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
                </div>
                <div class="post-content grap" itemprop="articleBody">
                    <?php $this->excerpt(200, '...'); ?>
                </div>
                <a href="<?php $this->permalink() ?>" class="continueread">继续阅读</a>
            </article>
        <?php endwhile; ?>
		
    </section>
    <?php $this->pageNav('<', '>'); ?>
	</main>

<?php $this->need('footer.php'); ?>