<?php

function php_sava($str)
{
    $farr = array(
        "/s+/",                                                                                         
        "/<(/?)(script|i?frame|style|html|body|title|link|meta|?|%)([^>]*?)>/isU",  
        "/(<[^>]*)on[a-zA-Z]+s*=([^>]*>)/isU",                                     
     
   );
   $tarr = array(
        " ",
        "＜＞",           //如果要直接清除不安全的标签，这里可以留空
        "",
   );

$str = preg_replace( $farr,$tarr,$str);
   return $str;
}

//php sql防注入代码

class sqlin
{

//dowith_sql($value)
function dowith_sql($str)
{
   $str = str_replace("and","&#97;nd",$str);
$str = str_replace("execute","&#101;xecute",$str);
$str = str_replace("update","&#117;pdate",$str);
$str = str_replace("count","&#99;ount",$str);
$str = str_replace("chr","&#99;hr",$str);
$str = str_replace("mid","&#109;id",$str);
$str = str_replace("master","&#109;aster",$str);
$str = str_replace("truncate","&#116;runcate",$str);
$str = str_replace("char","&#99;har",$str);
$str = str_replace("declare","&#100;eclare",$str);
$str = str_replace("select","&#115;elect",$str);
$str = str_replace("create","&#99;reate",$str);
$str = str_replace("delete","&#100;elete",$str);
$str = str_replace("insert","&#105;nsert",$str);
$str = str_replace("'","&#39;",$str);
   //echo $str;
   return $str;
}
//aticle()防SQL注入函数//php教程
function sqlin()
{
   foreach ($_GET as $key=>$value)
   {
       $_GET[$key]=$this->dowith_sql($value);
   }
   foreach ($_POST as $key=>$value)
   {
       $_POST[$key]=$this->dowith_sql($value);
   }
}
}

$dbsql=new sqlin();
?>