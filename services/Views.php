<?php

class Views
{
    public static function render($file, $data=null){
        require_once(ROOT.'/views'.$file);
    }

}
