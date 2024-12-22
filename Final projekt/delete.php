<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "crud";
            $table = "tbl1";

            if(isset($_GET["id"])){
                $id=$_GET["id"];
                try{
                    $dsn="mysql:host=$host;dbname=$dbname";
                    $conn=new PDO($dsn,$username,$password);
                    $sql="DELETE FROM $table WHERE Nr=:id";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute([":id"=>$id]);
                    header("location:page2.php?delete");
                    exit;


                }
                catch(PDOException $A){
                    echo "error ".$A->getmessage();
                }
            }
    
    ?>
     <form action="update.php" method="post">
            <label for="invoicenr">Invoice Number</label>
            <input type="number" id="invoicenr" name="invoicenr" value="<?php echo htmlspecialchars($data["Invoicenr"]) ?>" placeholder="Enter invoice number" >

            <label for="companyname">Company Name</label>
            <input type="text" id="companyname" name="companyname" value="<?php echo htmlspecialchars($data["Companyname"]) ?>" placeholder="Enter company name" >

            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter address" value="<?php echo htmlspecialchars($data["Addres"]) ?>">

            <label for="number">Phone Number</label>
            <input type="number" id="number" name="phonenumber" placeholder="Enter phone number" value="<?php echo htmlspecialchars($data["Phonenumber"]) ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($data["Email"]) ?>">

            <label for="productpurchase">Product Purchased</label>
            <textarea type="text" id="productpurchase" name="productpurchase" placeholder="Enter product purchased" value="<?php echo htmlspecialchars($data["Productpurchase"]) ?>"></textarea>
                

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" value="<?php echo htmlspecialchars($data["Quantity"]) ?>">

            <label for="totalprice">Total Price</label>
            <input type="number" id="totalprice" name="totalprice" contenteditable="false"placeholder="Enter total price" value="<?php echo htmlspecialchars($data["Totalprice"]) ?>" >

            <input type="submit" name="btn" value="Create Invoice">
        </form>
</body>
</html>