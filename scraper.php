<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marcin
 * Date: 07.01.14
 * Time: 16:09
 * To change this template use File | Settings | File Templates.
 */

require('simple_html_dom.php');

$currentUrl='http://darwinawards.com/darwin/darwin1993-02.html';

$allUrl = array();
$isNext=TRUE;

while($isNext){//there is next link
$allUrl[] .= $currentUrl;
$currentPage=file_get_html($currentUrl);
$currentStory=$currentPage->find('td [bgcolor=#FFFFFF]')->plaintext;
echo $currentStory;
if(isset($currentPage->find('td [bgcolor=#FFFFFF]'))){
   $currentUrl='http://darwinawards.com/darwin/';
   $allLinks=$currentPage->find('a');
   foreach($allLinks as $link){
       if(isset($link->find('img [width=61]'))){
           $currentUrl = $link->href;
       }
   }
}else{
    $isNext=FALSE;
}
}