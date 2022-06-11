<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    // 상태바에 표시될 제목
    $g5_head_title = implode(' | ', array_filter(array($g5['title'], $config['cf_title'])));
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!doctype html>
<html lang="ko">
<head>
<meta name="naver-site-verification" content="2703f2bff966d351665a4ad8682bdd4df2a61a03" />
<link rel="canonical" href="http://www.bareumcompany.co.kr/">
<meta charset="utf-8">
<link rel="shortcut icon" href="/favifavi.ico" type="image/x-ico" />
<title><?php echo $g5_head_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="바른 마음과 바른 생각으로 바른 성과를 이루어내는 공간 주식회사 바름컴퍼니 입니다.">
<meta property="og:type" content="website"> 
<meta property="og:title" content="(주)바름컴퍼니">
<meta property="og:description" content="바른 마음과 바른 생각으로 바른 성과를 이루어내는 공간 주식회사 바름컴퍼니 입니다.">
<meta property="og:image" content="http://bareumcompany.co.kr/img/logo.jpg">
<meta property="og:url" content="http://www.bareumcompany.co.kr/">
<link rel="stylesheet" href="<?php echo run_replace('head_css_url', G5_THEME_CSS_URL.'/'.(G5_IS_MOBILE ? 'mobile' : 'default').'.css?ver='.G5_CSS_VER, G5_THEME_URL); ?>">


<!-- css -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
<link href="<?php echo G5_THEME_URL; ?>/css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo G5_THEME_URL; ?>/css/bootstrap-responsive.css" rel="stylesheet" />
<link href="<?php echo G5_THEME_URL; ?>/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="<?php echo G5_THEME_URL; ?>/css/jcarousel.css" rel="stylesheet" />
<link href="<?php echo G5_THEME_URL; ?>/css/flexslider.css" rel="stylesheet" />
<link href="<?php echo G5_THEME_URL; ?>/css/slitslider.css" rel="stylesheet" />
<link href="<?php echo G5_THEME_URL; ?>/css/style.css" rel="stylesheet" />
<!-- Theme skin -->
<link id="t-colors" href="<?php echo G5_THEME_URL; ?>/skins/default.css" rel="stylesheet" />
<!-- boxed bg -->
<link id="bodybg" href="<?php echo G5_THEME_URL; ?>/bodybg/bg1.css" rel="stylesheet" type="text/css" />
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo G5_THEME_URL; ?>/ico/apple-touch-icon-144-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo G5_THEME_URL; ?>/ico/apple-touch-icon-114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo G5_THEME_URL; ?>/ico/apple-touch-icon-72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" href="<?php echo G5_THEME_URL; ?>/ico/apple-touch-icon-57-precomposed.png" />
<link rel="shortcut icon" href="<?php echo G5_THEME_URL; ?>/ico/favifavi.png" />



<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
</script>
<?php
add_javascript('<script src="'.G5_JS_URL.'/jquery-1.12.4.min.js"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery-migrate-1.4.1.min.js"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.menu.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/common.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/wrest.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/placeholders.min.js"></script>', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/font-awesome/css/font-awesome.min.css">', 0);

if(G5_IS_MOBILE) {
    add_javascript('<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>
</head>
<body>
<?php
if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
    $sr_admin_msg = '';
    if ($is_admin == 'super') $sr_admin_msg = "최고관리자 ";
    else if ($is_admin == 'group') $sr_admin_msg = "그룹관리자 ";
    else if ($is_admin == 'board') $sr_admin_msg = "게시판관리자 ";

    echo '<div id="hd_login_msg">'.$sr_admin_msg.get_text($member['mb_nick']).'님 로그인 중 ';
    echo '<a href="'.G5_BBS_URL.'/logout.php">로그아웃</a></div>';
}