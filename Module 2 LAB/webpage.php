<html>
    <head>
        <title>MyFirst Php Page</title>
        <style>
            body{
                font-family:Arial, Helvetica, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                text-align: center;
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <!--add Php to the body -->
        <?php
        $name = "Asha";

        ?>

        <p>Hi! My name is <?php echo $name ?>, and I'm on the women's soccer team </p>
    </body>
</html>