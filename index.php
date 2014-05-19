<?php
/**
 * User: samnajian
 * Date: 1/22/14
 * Time: 2:20 AM
 */
include "DCHtml.php";
?>
<h3>Anchor tag</h3><?php echo DCHtml::link("asfasd", "http://google.com", array('class' => 'asdsa')); ?>
<hr/>

<h3>Label tag</h3>
<?php echo DCHtml::label("This is a table", "my_input", array( 'class' => "my_label" )); ?>
<hr/>

<h3>Text field</h3>
<?php echo DCHtml::textField("my_name", null, array( "class" => "my_text_class" )); ?>
<hr/>

<h3>Hidden field</h3>
<?php echo DCHtml::hiddendField("my_hidden_field", "hidden_val", array('id' => 'hidden')); ?>
<hr/>

<h3>Textarea</h3>
<?php echo DCHtml::textarea("text_area_name", "",  array( 'placeholder' => 'This is a textarea' )); ?>
<hr/>

<h3>Select</h3>
<?php echo DCHtml::select("my_select_name", array(
    1 => "Sam",
    2 => "Samira"
), 2, "Select your name", array(
        'class' => 'my_select'
    )
) ?>
<hr/>

<h3>Image</h3>
<?php
    echo DCHtml::image("http://northchathamlibrary.org/files/2014/05/Bird.jpg", "alt text", array(
        'class' => "image_class",
        'width' => 200
    ));
?>

