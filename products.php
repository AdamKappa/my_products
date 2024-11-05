<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>List of Products</title>
</head>
<body>

    <h1>List of products</h1>

    <!-- HTML Form for adding a new product -->
    <form method="POST" action="">
        <div class="form-container">
            <div class="form-item">
                <label for="name">Name (required):</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-item">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price">
            </div>
            
            <div class="form-item">
                <label for="quantity">Quantity:</label>
                <input type="text" id="quantity" name="quantity">
            </div>
            
            <div class="form-item">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category">
            </div>
            
            <div class="form-item">
                <label for="manufacturer">Manufacturer:</label>
                <input type="text" id="manufacturer" name="manufacturer">
            </div>

            <div class="form-item">
                <label for="barcode">Barcode:</label>
                <input type="text" id="barcode" name="barcode">
            </div>
            
            <div class="form-item">
                <label for="weight">Weight:</label>
                <input type="text" id="weight" name="weight">
            </div>
            
            <div class="form-item">
                <label for="instock">In Stock:</label>
                <input type="text" id="instock" name="instock">
            </div>
            
            <div class="form-item">
                <label for="availability">Availability:</label>
                <input type="text" id="availability" name="availability">
            </div>
                
            <input type="submit" value="Add Product">
        </div>
    </form>

    <div class="product-list">
    <?php
        require_once("./lib.php");
        $productsList = new Products("./products.xml");

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productsList->add_product($_POST);
            echo "Product added successfully!";
        }

        $productsList->print_html_table_with_all_products();
    ?>
    </div>
</body>
</html>