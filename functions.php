<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function img_postthumb($cid) {
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')
        ->from('table.contents')
        ->where('table.contents.cid=?', $cid)
        ->order('table.contents.cid', Typecho_Db::SORT_ASC)
        ->limit(1));
  
    preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
    $img_src = $thumbUrl[1][0];  //将赋值给img_src
    $img_counter = count($thumbUrl[0]);  //一个src地址的计数器
  
    switch ($img_counter > 0) {
        case $allPics = 1:
            echo $img_src;  //当找到一个src地址的时候，输出缩略图
            break;
        default:
            echo "";  //没找到(默认情况下)，不输出任何内容
    };
}

function timer_start() {
  global $timestart;
  $mtime = explode( ' ', microtime() );
  $timestart = $mtime[1] + $mtime[0];
  return true;
}
timer_start();

function timer_stop( $display = 0, $precision = 3 ) {
  global $timestart, $timeend;
  $mtime = explode( ' ', microtime() );
  $timeend = $mtime[1] + $mtime[0];
  $timetotal = $timeend - $timestart;
  $r = number_format( $timetotal, $precision );
  if ( $display )
    echo $r;
  return $r;
}

//自定义评论列表区域
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-author">
            <?php
            
            $host = 'https://sdn.geekzu.org/'; //自定义头像CDN服务器
            $url = '/avatar/'; //自定义头像目录,一般保持默认即可
            $size = '32'; //自定义头像大小
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
            ?>
            <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" width="<?php echo $size ?>" height="<?php echo $size ?>" />
            <cite class="fn"><?php $comments->author(); ?></cite>
        </div>
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
        </div>
        <?php $comments->content(); ?>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<? }

