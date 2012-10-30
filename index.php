<?php
// vim: set et sw=4 ts=4 sts=4 fdm=marker ff=unix fenc=utf8
/**
 * Motion Homepage
 *
 * @author mingcheng<i.feelinglucky@gmail.com>
 * @date   2009-04-05
 * @link   http://www.gracecode.com/
 */

$include_file = 'index.xml';
$request_base = '/motion/';
$site_uri = 'http://127.0.0.1/motion/';

$request_include_file = substr($_SERVER['REQUEST_URI'], strlen($request_base)).'.xml';

if(file_exists('./'.$request_include_file) && is_file($request_include_file)) {
    $include_file = './'.$request_include_file;
}

if (!strstr($include_file, '.xml')) {
    header('Location: '. $site_uri);
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Motion - 小型高效的 Javascript 动画组件</title>
        <style type="text/css">@import url(<?php echo $site_uri ?>/css/motion.css); </style>
<?php
/*
      <script type="text/javascript" src="<?php echo $site_uri ?>/motion.js"></script>
 */
?>
      <script type="text/javascript" src="<?php echo $site_uri ?>/motion.js"></script>
    </head>
    <body>
        <div class="main-wrap">
            <div class="header">
                <h1 id="logo" style="left: 450px;"><a href="http://lab.gracecode.com/motion/">Motion</a></h1>
                <script type="text/javascript">
                    var logo = document.getElementById('logo');
                    logo.style.left = '0px';
                    window.onload = function() {
                        var logoMotion = new Motion('bounceOut', 1000);
                        logoMotion.onTweening = function() {
                            logo.style.left = this.equation(0, 450) + 'px';
                        };

                        setTimeout(function() { logoMotion.start(); }, 1000);
                    };
                </script>
            </div>

<?php
    echo file_get_contents($include_file);
?>
            <div class="foot">
                <small>$Id$</small>
                <br />
                <a href="http://www.gracecode.com/">Gracecode.com</a>
            </div>
        </div>
        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
            var pageTracker = _gat._getTracker("UA-2634498-1");
            pageTracker._trackPageview();
            } catch(err) {}
        </script>
        <img src="http://img.tongji.cn.yahoo.com/0/8/415/ystat.gif" alt="Yahoo 统计" style="display:none;" />
    </body>
</html>
