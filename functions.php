<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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

function themeInit($archive)
{ 
    if ($archive->is('post') || $archive->is('page')) {
        $archive->content = preg_replace('#<img(.*?) src="(.*?)" (.*?)>#',
        '<img$1 data-original="$2" class="lazy" $3>', $archive->content);
    }
}

function showThumbnail($widget) {
$attach = $widget->attachments(1)->attachment;
$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
$random = 'https://finer04-cos.b0.upaiyun.com/yourname.jpg';
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
echo $thumbUrl[1][0];
} else
if ($attach && $attach->isImage) {
echo $attach->url;
} else {
echo $random ;
} }