<?php
class weightProducts extends Product
{
    private $weight = null;

    public function getAll()
    {
        $config = include('config.php');
        $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM products where products.type = 2";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
                //echo " i = " . $i;
                $data[$i] = new weightProducts($row['sku'], $row['name'], $row['price'],$row['type']);
                $data[$i]->setWeight($row['weight']);
                $data[$i]->print();
                $i++;
            }
        }
        $conn->close();
        unset($data);
    }

    public function setWeight($w)
    {
        $this->weight = $w;
    }

    public function print()
    {
        echo "<ul><p>SKU: " . $this->getSku() . "</p><p> Name: " . $this->getName() . "</p><p> Price: " . $this->getPrice() . " $</p>";
        echo "<p> Weight: " . $this->weight . " KG</p></ul>";
    }
}
?>