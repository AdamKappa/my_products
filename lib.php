<?php
class Products{

    private $xml_file_path = '';

    public function __construct($xml_file_path = '')
    {
        $this->xml_file_path = $xml_file_path;
    }

    /**
     * This function prints an HTML table with all the products as read from the xml file
     * @return void 
     */
    public function print_html_table_with_all_products(){
        //TODO 1:Θα πρέπει να συμπληρώσουμε την συνάρτηση ώστε να κάνει print το HTML table με τα προϊόντα του xml
        $xmldata = simplexml_load_file($this->xml_file_path) or die("Failed to load");
        $xml_data = $xmldata->children();

        // open HTML table
        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Category</th><th>Manufacturer</th><th>Barcode</th><th>Weight</th><th>In Stock</th><th>Availability</th></tr>';

        //for each product print the line
        foreach ($xml_data->PRODUCTS->PRODUCT as $key => $prod) {
            
            $this->print_html_of_one_product_line($prod);
        
        }

        // close HTML table
        echo '</table>';
        
    }

    /**
     * This function prints an HTML tr for a given product
     * @param mixed $prod It is the product object as retrieved from the xml file
     * @return void 
     */
    private function print_html_of_one_product_line($prod){
        //TODO 2: Θα πρέπει να συμπληρώσουμε τη συνάρτηση ώστε να κάνει print τα tr με τα στοιχεία του ενός προϊόντος
        //var_dump($prod);
        echo '<tr>';
        echo '<td>' . htmlspecialchars($prod->NAME) . '</td>';
        echo '<td>' . htmlspecialchars($prod->PRICE) . '</td>';
        echo '<td>' . htmlspecialchars($prod->QUANTITY) . '</td>';
        echo '<td>' . htmlspecialchars($prod->CATEGORY) . '</td>';
        echo '<td>' . htmlspecialchars($prod->MANUFACTURER) . '</td>';
        echo '<td>' . htmlspecialchars($prod->BARCODE) . '</td>';
        echo '<td>' . htmlspecialchars($prod->WEIGHT) . '</td>';
        echo '<td>' . htmlspecialchars($prod->INSTOCK) . '</td>';
        echo '<td>' . htmlspecialchars($prod->AVAILABILITY) . '</td>';
        echo '</tr>';
    }


    /**
     * This function adds a new product to the XML file.
     *
     * It takes an associative array containing product data as input and creates a new 
     * PRODUCT entry in the XML structure. The NAME field is mandatory, while the rest 
     * are optional. After adding the product, it saves the updated XML back to the file.
     *
     * @param array $data An associative array containing product information.
     *                    Expected keys: 'name', 'price', 'quantity', 'category', 
     *                    'manufacturer', 'barcode', 'weight', 'instock', 'availability'.
     * @return void
     */
    public function add_product($data) {
        // Load the existing XML file
        $xmldata = simplexml_load_file($this->xml_file_path);
        
        // Create a new PRODUCT element
        $new_product = $xmldata->PRODUCTS->addChild('PRODUCT');
        
        // Add product data to the new PRODUCT element
        $new_product->addChild('NAME', htmlspecialchars($data['name']));
        if (!empty($data['price'])) $new_product->addChild('PRICE', htmlspecialchars($data['price']));
        if (!empty($data['quantity'])) $new_product->addChild('QUANTITY', htmlspecialchars($data['quantity']));
        if (!empty($data['category'])) $new_product->addChild('CATEGORY', htmlspecialchars($data['category']));
        if (!empty($data['manufacturer'])) $new_product->addChild('MANUFACTURER', htmlspecialchars($data['manufacturer']));
        if (!empty($data['barcode'])) $new_product->addChild('BARCODE', htmlspecialchars($data['barcode']));
        if (!empty($data['weight'])) $new_product->addChild('WEIGHT', htmlspecialchars($data['weight']));
        if (!empty($data['instock'])) $new_product->addChild('INSTOCK', htmlspecialchars($data['instock']));
        if (!empty($data['availability'])) $new_product->addChild('AVAILABILITY', htmlspecialchars($data['availability']));
        
        // Save the updated XML back to the file
        $xmldata->asXML($this->xml_file_path);
    }
}
