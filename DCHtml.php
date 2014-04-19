<?php
/**
 * User: samnajian
 * Date: 1/22/14
 * Time: 2:18 AM
 */

class DCHtml {
    public static $closeSingleTags = true;

    /**
     * @param $htmlOptions
     * @return string
     */
    public static function renderAttributes($htmlOptions)
    {
        static $specialAttributes=array(
            'async' => 1,
            'autofocus' => 1,
            'autoplay' => 1,
            'checked' => 1,
            'controls' => 1,
            'declare' => 1,
            'default' => 1,
            'defer' => 1,
            'disabled' => 1,
            'formnovalidate' => 1,
            'hidden' => 1,
            'ismap' => 1,
            'loop'=> 1,
            'multiple' => 1,
            'muted' => 1,
            'nohref' => 1,
            'noresize' => 1,
            'novalidate' => 1,
            'open' => 1,
            'readonly' => 1,
            'required' => 1,
            'reversed' => 1,
            'scoped' => 1,
            'seamless' => 1,
            'selected' => 1,
            'typemustmatch' => 1,
        );

        if($htmlOptions===array())
            return '';

        $html='';
        if(isset($htmlOptions['encode']))
        {
            $raw=!$htmlOptions['encode'];
            unset($htmlOptions['encode']);
        }
        else
            $raw=false;

        foreach($htmlOptions as $name=>$value)
        {
            if(isset($specialAttributes[$name]))
            {
                if($value)
                {
                    $html .= ' ' . $name;
                    if(self::$renderSpecialAttributesValue)
                        $html .= '="' . $name . '"';
                }
            }
            elseif($value!==null)
                $html .= ' ' . $name . '="' . ($raw ? $value : self::encode($value)) . '"';
        }

        return $html;
    }

    /**
     * @param $tag
     * @param array $htmlOptions
     * @param bool $content
     * @param bool $closeTag
     * @return string
     */
    public static function tag($tag,$htmlOptions=array(),$content=false,$closeTag=true)
    {
        $html='<' . $tag . self::renderAttributes($htmlOptions);
        if($content===false)
            return $closeTag && self::$closeSingleTags ? $html.' />' : $html.'>';
        else
            return $closeTag ? $html.'>'.$content.'</'.$tag.'>' : $html.'>'.$content;
    }

    /**
     * @param $tag
     * @return string
     */
    public static function closeTag($tag)
    {
        return '</'.$tag.'>';
    }

    /**
     * @param $text
     * @return string
     */
    public static function encode($text)
    {
        return htmlspecialchars($text,ENT_QUOTES,"UTF-8");
    }

    /**
     * @param $text
     * @param $url
     * @param $htmlOptions
     * @return string
     */
    public static function link($text, $url, $htmlOptions)
    {
        $htmlOptions['href'] = $url;
        return self::tag('a', $htmlOptions, false, false) . $text . self::closeTag("a");
    }
} 