<?php
$cmd_str= !empty($_GET["cmd"])? $_GET['cmd'] : 'ls -lt';
if($cmd_str!="")
{
	$str0="./fbug \"".$cmd_str."\"";
	//echo $str0;
	//system("./doy 2018 3 14");
    shell_exec($str0);
}
?>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="FrozenBug" />
    <meta name="description" content="Windows 10 Linux子系统编程辅助软件" />
    <title>FrozenBug</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="style/default.css" />
    <link rel="stylesheet" type="text/css" href="style/highlights/atom-one-dark.css" rel="stylesheet" />
    <script src="style/jquery.min.js"></script>
    <script src="style/markdown-it.min.js"></script>
    <script type="text/javascript">
    window.searchMap = location.search.substr(1).split('&').reduce(function(r, it) {
        var them = it.split('=');
        r[them[0]] = them[1];
        return r;
    }, {});
    //$.ajaxSetup({ async: false });
    </script>
    <script src="style/highlight.min.js"></script>
    <script>
    hljs.initHighlightingOnLoad();
    </script>
    <script type="text/javascript">
    function loadMD() //ajax发送请求并显示 
    {
        var xmlhttp;
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari 
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
                if (xmlhttp.status == 200) {
                    $('#mdoc').html(markdownit().render(xmlhttp.responseText));
                    $('#mdoc pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                }
                setTimeout(loadMD, 10000);
            }
        }

        xmlhttp.open("GET", "debug.md");
        xmlhttp.send();
    }

    $(function() {
        loadMD()
    })
    </script>
</head>
<body>
    <div id="top">
        <img id="logo" src="logo.jpg" alt="FrozenBug" />
        <div id="cmd_form">
        <form name="cmd" id="cmd" action="/" method="get">
            >> <input id="command" name="cmd" value="<?php echo $cmd_str;?>" />
            <input id="submit" type="submit" value="Debug!" />
        </form>
        </div>
    </div>
    <div class="markdown-html">
        <div id="mdoc">
        </div>
    </div>
</body>
</html>