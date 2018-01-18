<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments" class="responsesWrapper wow fadeIn" data-wow-delay="0.5s">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
	<h3 class="comments-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <div class="comment-list-wrap">
    <?php $comments->listComments(); ?>
    </div>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>


    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    	<h3 id="response" class="comment-reply-title"><?php _e('添加新评论'); ?></h3>
      <div class="comment-r">
    	    <p class="comment-form-comment">

<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="comment-form" role="form">
<div class="container">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
			<div class="col-xs-5">
    		<p class="comment-form-author">
            <label for="author"><?php _e('称呼'); ?> <span class="required">*</span></label>
    			<input type="text" name="author" id="author" class="form-control" placeholder="Enter your name" value="<?php $this->remember('author'); ?>" required />
			</p>
			</div>
			<div class="col-xs-5">
    		<p class="comment-form-email">
                <label for="mail"><?php _e('Email'); ?> <span class="required">*</span></label>
    			<input type="email" name="mail" id="mail" class="form-control" placeholder="Enter email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
			</div>
			<div class="col-xs-5">
    		<p class="comment-form-url">
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
    			<input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
			</div>
            <?php endif; ?>
			<div class="form-group" style="margin:10px 0;">
                <label for="textarea"><?php _e(''); ?></label>
                <textarea rows="8" name="text" id="textarea" class="form-control" placeholder="Write something..." required ><?php $this->remember('text'); ?></textarea>
            </p>
			 </div>
    		
                <button type="submit" class="submit btn btn-primary btn-lg btn-block"><?php _e('提交评论'); ?></button>
            </div>
    	</form>
    </div>
</div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
