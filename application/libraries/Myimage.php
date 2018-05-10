<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2018/1/18
 * Time: 9:23
 */
//图像处理类
class Myimage
{
    //将头像宽压缩到180px
    public function resizeImg($src, $width, $height)
    {
        $CI = & get_instance(); //$this
        $CI->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $src;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        $CI->image_lib->initialize($config);
        $res = $CI->image_lib->resize();
        return $res;
    }




}