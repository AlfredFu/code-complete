<?php
//显示 Youtube 或 Vimeo 视频缩略图 
function video_image($url){
   $image_url = parse_url($url);
     if($image_url['host'] == 'www.youtube.com' || 
        $image_url['host'] == 'youtube.com'){
         $array = explode("&", $image_url['query']);
         return "http://img.youtube.com/vi/".substr($array[0], 2)."/0.jpg";
     }else if($image_url['host'] == 'www.youtu.be' || 
              $image_url['host'] == 'youtu.be'){
         $array = explode("/", $image_url['path']);
         return "http://img.youtube.com/vi/".$array[1]."/0.jpg";
     }else if($image_url['host'] == 'www.vimeo.com' || 
         $image_url['host'] == 'vimeo.com'){
         $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".
         substr($image_url['path'], 1).".php"));
         return $hash[0]["thumbnail_medium"];
     }
}
?>
<img src="<?php echo video_image('youtube URL'); ?>" />
