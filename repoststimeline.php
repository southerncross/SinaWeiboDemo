<script language="JavaScript">
var ready = 1;
function myrefresh(){
    if (ready == 1) {
    window.location.reload();
    }
}
//setTimeout('myrefresh()',5000); 
</script>

<?php 
include_once('config.php');
include_once('saetv2.ex.class.php');

session_start();

$fdir = '/var/www/html/static/';

$c = new SaeTClientV2(WB_AKEY, WB_SKEY, $_SESSION['token']['access_token']);
$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id($uid);
//$id = 3558778781876930;
//$ids = array(3564399216081520, 3558778781876930);
$ids = array(3564399216081520);
$code_url = 'localhost.repoststimeline.php';
$msg = $c->rate_limit_status();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>获取微博转发列表</title>
</head>

<body>
    <?=$user_message['screen_name']; ?>,您好！ 
    <br />
    <?php print_r($msg);?>
    <br />
    <?php print_r($msg['api_rate_limits']); ?>
    <br />
    <?php 
    /*
    foreach ($ids as $id) {
        $fname = $fdir.$id;
        $page_number = 1;
        $max_id = 0;
       
        do {
            //参数列表($sid, $page = 1, $count = 50, $since_id = 0, $max_id = 0, $filter_by_author = 0)
            $ms = $c->repost_timeline($id, $page_number, 50, null, null, null);
            //echo "id=".$id.", size=".count($ms['reposts']).", maxid=".$max_id."page: ".$page_number."<br />";
            foreach ($ms['reposts'] as $item) { 
         file_put_contents($fname, $item['id']."\t", FILE_APPEND); 
	       file_put_contents($fname, $item['user']['name']."\t", FILE_APPEND); 
	       file_put_contents($fname, $item['user']['gender']."\t", FILE_APPEND); 
	       file_put_contents($fname, $item['user']['followers_count']."\t", FILE_APPEND); 
	       file_put_contents($fname, $item['user']['friends_count']."\t", FILE_APPEND); 
	       file_put_contents($fname, $item['user']['verified']."\t", FILE_APPEND); 
	       file_put_contents($fname, $item['text'], FILE_APPEND); 
               file_put_contents($fname, "\n", FILE_APPEND); 
            }
            $page_number = $page_number + 1;
            sleep(1);
        } while (0 != count($ms['reposts']));
        
        echo $id."is ok"."<br />";
    }
    */
    ?>
</body>
</html>
