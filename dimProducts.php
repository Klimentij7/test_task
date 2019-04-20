<?php
class dimProducts extends Product
{
    private $height = null;
    private $width = null;
    private $length = null;

    public function getAll()
    {
        $config = include('config.php');
        $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM products where products.type = 3";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
                //echo " i = " . $i;
                $data[$i] = new dimProducts($row['sku'], $row['name'], $row['price'],$row['type']);
                $data[$i]->setHWL($row['height'],$row['width'],$row['length']);
                $data[$i]->print();
                $i++;
            }
        }
        $conn->close();
        unset($data);
    }

    public function setHWL($h, $w, $l)
    {
        $this->height = $h;
        $this->width = $w;
        $this->length = $l;
    }

    public function print()
    {
        echo "<ul><p>SKU: " . $this->getSku() . "</p><p> Name: " . $this->getName() . "</p><p> Price: " . $this->getPrice() . " $</p>";
        echo "<p> Dimension: " . $this->height . "x" . $this->width . "x" . $this->length . "</p></ul>";
    }
}


?>