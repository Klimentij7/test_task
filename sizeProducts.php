<?php
class sizeProducts extends Product
{
    private $size = null;

    public function getAll()
    {
        $config = include('config.php');
        $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM products where products.type = 1";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
                //echo " i = " . $i;
                $data[$i] = new sizeProducts($row['sku'], $row['name'], $row['price'],$row['type']);
                $data[$i]->setSize($row['size']);
                $data[$i]->print();
                $i++;
            }
        }
        $conn->close();
        unset($data);
    }

    public function setSize($si)
    {
        $this->size = $si;
    }

    public function print()
    {
        echo "<ul><p>SKU: " . $this->getSku() . "</p><p> Name: " . $this->getName() . "</p><p> Price: " . $this->getPrice() . " $</p>";
        echo "<p> Size: " . $this->size . " MB</p></ul>";
    }
}
?>