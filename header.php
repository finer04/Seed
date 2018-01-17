<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
  <link rel="stylesheet" href="static/css/main.css">
  <link rel="stylesheet" href="static/css/my.css">
  <link href="//cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
  <script src="//cdn.bootcss.com/wow/1.1.2/wow.min.js"></script>



    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body <?php if ( $this->is('post') ) echo ' class="single"' ?> >
<div id="page">
<div class="headerx animated slideInDown" data-wow-duration="0.9s">
      <header class="site-header hasImage">
        <div class="navheader">
        <p class="site-title">
            <a title="" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        </p>
        <nav id="nav-menu" class="topNav u-textAlignCenter" role="navigation" style="position: absolute;top: 0px;right: 0;">
        <ul id="menu-%e8%8f%9c%e5%8d%951" class="topNav-items">
            <li class="menu-item<?php if($this->is('index')): ?> current-menu-item<?php endif; ?>"> <a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
            <?php while($category->next()): ?>
                <li class="menu-item<?php if($this->is('category', $category->slug)): ?> current-menu-item<?php endif; ?>"><a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </nav>
          </div>
      <?php if ( $this->is('post') || $this->is('page') ) : ?>    
      <div class="post-header">
        <h2 class="grap--h2"><?php $this->title() ?></h2>
         <div class="block-postMetaWrap">
          <?php echo $this->author->gravatar(32);?>
          <time><?php $this->date('F j, Y'); ?></time>
          </div>
    </div>
    </header>
            <?php endif;?>
        </div>


 <div class="surface-content">


    