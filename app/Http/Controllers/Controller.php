<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Youtube and vimeo video link conversions

    public function embed_link($link)
    {
       /* Youtube and vimeo link management
       */
       /**
       * Youtube link
       * https://youtu.be/Pxg2l1nKZXs
       *
       * You tube embeded link look like this
       * https://www.youtube.com/embed/Pxg2l1nKZXs
       *
       * vimeo link
       * https://vimeo.com/755255216
       *
       ** vimeo embeded link look like this
       * "https://player.vimeo.com/video/755255216"
       */

       if(strpos($link,'youtu.be/')){

       /* if someone gives shortlink with or without time function
       *
       * Shortlink looks like this
       * https://youtu.be/Pxg2l1nKZXs
       *
       *Shortlink with time function looks like this
       * https://youtu.be/Pxg2l1nKZXs?t=430
       */

       $embed = str_replace('youtu.be/','www.youtube.com/embed/',$link);
       $remove_time = explode('?t',$embed);
       $embeded_link = $remove_time[0];
       return $embeded_link;

       }elseif(strpos($link,'vimeo.com')){

       /* if someone gives vimeo link with or without time function
       * vimeo link looks like this
       * https://vimeo.com/755255216
       *
       */
       $embed = str_replace('vimeo.com','player.vimeo.com/video',$link);
       return $embed;
       }else{

       /* if someone gives full link with or without time function
       * Full link looks like this
       * https://www.youtube.com/watch?v=4mktIk2GfC8
       *
       *full link with time function looks like this
       * https://www.youtube.com/watch?v=4mktIk2GfC8?t=430
       */

       $embed = str_replace('watch?v=','embed/',$link);
       $remove_time = explode('?t',$embed);
       $embeded_link = $remove_time[0];
       return $embeded_link;
       }
    }


    /*
    *Custom slug make for slug management
    * it will replace laravel default Str::slug system
    */
    public function Slugmake($value)
    {
        $slug = strtolower($value);
        return str_replace(' ','-',$slug);
    }

}
