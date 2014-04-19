<?php
/**
 * User: samnajian
 * Date: 1/22/14
 * Time: 2:18 AM
 */

class DCHtml {
    public static $closeSingleTags = true;
    public static $allowSpecialCharacters = true;

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
                    if(self::$allowSpecialCharacters)
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
    public static function link($text, $url, $htmlOptions = array())
    {
        $htmlOptions['href'] = $url;
        return self::tag('a', $htmlOptions, false, false) . $text . self::closeTag("a");
    }

    /**
     * @param $text
     * @param null $for
     * @param $htmlOptions
     * @return string
     */
    public static function label($text, $for = null, $htmlOptions = array()){
       $htmlOptions['for'] = $for;
        return self::tag("label", $htmlOptions, false, false) . $text . self::closeTag("label");
    }

    /**
     * @param $name
     * @param $value
     * @param $type
     * @param $htmlOptions
     * @return string
     */
    public static function input($name, $value, $type, $htmlOptions){
        $htmOptions['name'] = $name;
        $htmOptions['value'] = $value;
        $htmOptions['type'] = $type;
        return self::tag("input", $htmOptions, false, true);
    }

    /**
     * @param $name
     * @param null $value
     * @param array $htmOptions
     * @return string
     */
    public static function textField($name, $value = null, $htmOptions = array()){
        return self::input($name, $value, "text", $htmOptions);
    }

    public static function hiddendField($name, $value = null, $htmlOptions = array()){
        return self::input($name, $value, "hidden", $htmlOptions);
    }
    /**
     * @param $name
     * @param null $value
     * @param array $htmlOptions
     * @return string
     */
    public static function textarea($name, $value = null, $htmlOptions = array()){
        $htmlOptions['name'] = $name;
        $htmlOptions['id'] = !isset( $htmlOptions['id'] ) ? str_replace( "]", "-", str_replace("[", "-", $name) ) : $htmlOptions['id'];
        return self::tag("textarea", $htmlOptions, false, false) . $value . self::closeTag("textarea");
    }

    /**
     * @param $name
     * @param array $options
     * @param null $selected
     * @param null $option_none
     * @param $htmlOptions
     * @return string
     */
    public static function select($name, $options = array(), $selected = null, $option_none = null, $htmlOptions){
        $htmlOptions['name'] = $name;
        $html = "";
        $html .= self::tag("select", $htmlOptions, false, false);

        if( null !== $option_none ){
            $html .= self::tag("option", array(
                'value' => 0
            ), false) . $option_none . self::closeTag("option");
        }

        foreach( $options as $key => $value ){
            $htmlOption = array(
                "value" => $key,
            );
            if( null !== $selected && $key == $selected ){
                $htmlOption['selected'] = "selected";
            }
            $html .= self::tag("option", $htmlOption , false, false) . $value . self::closeTag("option");
        }

        $html .= self::closeTag("select");
        return $html;
    }
}