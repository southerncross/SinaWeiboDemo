<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id($uid);
$code_url = 'repoststimeline.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>获取用户微博列表</title>
</head>

<body>
    <?=$user_message['screen_name'] ?>，你好！
    <h2 align="left">输入微博用户昵称</h2>
    <form action="" >
        <input type="text" name="username" style="width:300px" />
        <input type="submit" />
    </form>
    <p><a href="<?=$code_url?>">获取转发列表</a></p>
    <?php
    if(isset($_REQUEST['username']) ) {
        $ms = $c->user_timeline_by_name($_REQUEST['username']); 
    }
    ?>
    <?php if(is_array($ms['statuses'])): ?>
    <?php foreach($ms['statuses'] as $item ): ?>
    <div style="padding:10px;margin:5px;border:1px solid #ccc">
  id:<?=$item['id']; ?><br></br>
	text:<?=$item['text']; ?><br></br>
	reposts_count:<?=$item['reposts_count']?><br></br>
	comments_count:<?=$item['comments_count']?><br></br>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>


</body>
</html>
