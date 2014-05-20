<?php
/**
 * User: samnajian
 * Date: 1/22/14
 * Time: 2:20 AM
 */
include "DCHtml.php";
?>
<html>
    <head>
        <title>DCHtml</title>
        <style type="text/css">
            html, body{
                margin: 0;
                padding: 0;
            }
            #wrap{
                width: 900px;
                margin: 0 auto;
                background: #e5e5e5;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            <h3>Anchor tag</h3>
            <?php echo DCHtml::link("asfasd", "http://google.com", array('class' => 'asdsa')); ?>
           <?php echo DCHtml::tag("hr"); ?>

            <h3>Label tag</h3>
            <?php echo DCHtml::label("This is a table", "my_input", array( 'class' => "my_label" )); ?>
            <?php echo DCHtml::tag("hr"); ?>


            <h3>Text field</h3>
            <?php echo DCHtml::textField("my_name", null, array( "class" => "my_text_class" )); ?>
            <?php echo DCHtml::tag("hr"); ?>


            <h3>Hidden field</h3>
            <?php echo DCHtml::hiddendField("my_hidden_field", "hidden_val", array('id' => 'hidden')); ?>
            <?php echo DCHtml::tag("hr"); ?>


            <h3>Textarea</h3>
            <?php echo DCHtml::textarea("text_area_name", "",  array( 'placeholder' => 'This is a textarea' )); ?>
            <?php echo DCHtml::tag("hr"); ?>


            <h3>Select</h3>
            <?php echo DCHtml::select("my_select_name", array(
                    1 => "Sam",
                    2 => "Samira"
                ), 2, "Select your name", array(
                    'class' => 'my_select'
                )
            ) ?>
            <?php echo DCHtml::tag("hr"); ?>


            <h3>Image</h3>
            <?php
            echo DCHtml::image("http://northchathamlibrary.org/files/2014/05/Bird.jpg", "alt text", array(
                'class' => "image_class",
                'width' => 200
            ));
            ?>
            <?php echo DCHtml::tag("hr"); ?>

            <h3>Button (input)</h3>
            <?php
            echo DCHtml::button("My Button", "submit", array(
                'id' => 'my_good_button'
            ));
            ?>
            <?php echo DCHtml::tag("hr"); ?>

            <h3>Button (Html button)</h3>
            <?php
            echo DCHtml::html_button("My Html Button", "submit", array(
                'id' => 'my_good_html_button'
            ));
            ?>
            <?php echo DCHtml::tag("hr"); ?>

        </div>

    </body>
</html>