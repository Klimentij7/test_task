<?php

require 'Product.php';

echo    "<html>
        <head>
        <link rel='stylesheet' href='./css/style.css'>
        <script type='text/javascript' src='./js/jquery-3.3.1.js'></script>
        <script type='text/javascript' src='./js/site.js'></script>
        </head>
        <body>
        <div class='row'>
        <div class='col-1'>1</div>
        <div class='col-2'>";
        if($_SERVER['REQUEST_URI'] == '/')
        {
            $sproducts = new sizeProducts();
            $sproducts->getAll();
            $dproducts = new dimProducts();
            $dproducts->getAll();
            $wproducts = new weightProducts();
            $wproducts->getAll();
        }
        elseif ($_SERVER['REQUEST_URI'] == '/add-new') {
            if (isset($_POST['str']))
            {
                //add func
            }
            readfile("./addForm.html");
        }

echo    "
        </div>
        <div class='col-1'>3</div>
        </div>
        </body>
        </html>";
?>