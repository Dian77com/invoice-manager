<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        *{



font-family: "Teko", serif;
font-optical-sizing: auto;
font-weight: 300;
font-style: normal;

padding:0px;
margin:0px;
box-sizing:border-box;
}
label{
            color:black;
        }
        body {
            font-family: Arial, sans-serif;

            background-color: #f4f4f4;
        }

        form{
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin-left:450px;
           

            
            
        }

        input {
            width: 95%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        #productpurchase{
            width: 95%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
            height:200px;

        }

        input[type="submit"] {
            background-color: #36454f;
            color: white;
            border: none;
            cursor: pointer;

        }

        input[type="submit"]:hover {
            background-color:rgb(54, 67, 75);
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            color:#36454f;
        }
        #divkryesor{
            position: fixed;
            width: 300px;
            height:100%;
            background-color:white;

        }
        .divform{
            padding-top:20px;
        }
        .logo{
            width: 300px;
            height:300px;
            margin:-40px;
            padding:0px;
        }
        .menu{
            width:45px;
            height:45px;
            padding:10px;
            border-radius:100%;
            margin-top:20px;
            cursor:pointer;
            margin-left:10px;
            position:fixed;


        }
        .logomenu{
            display:flex;
            justify-content:space-around;
        }
        .divb{
            display:block;
            
        }
        .dashbord,.create{

            width:250px;
            height:40px;
            display:flex;
            justify-content:center;
            gap:10px;
            align-items:center;
            font-size:25px;
            margin:auto;
            background-color:#d9d9d9;
            border:none;
            border-radius:15px;
            cursor:pointer;
            text-align:center;
            padding-top:5px;

        }
        svg{
            width:25px;
            height:25px;
            margin-top:-3px;


        }
        .dashbord:hover,.create:hover,.menu:hover{
            box-shadow:0px 0px 3px #36454f;
        }
        .divb{
            display:flex;

            flex-direction:column;
            gap:20px;
        }
        .pmessage {
    position: fixed;
    left: 500px;
    top: 200px;
    width: 400px;
    height: 100px;
    font-size: 25px;
    background: white;
    border-radius: 5px;
    box-shadow: 0px 0px 10px black;
    text-align: center;
    padding-top: 30px;
    animation-name: key1;
    animation-duration: 3s;
}
a{
    text-decoration:none;
}

@keyframes key1 {
    0% {
        opacity: 1; 
    }
    100% {
        opacity: 0.1;
    }
}



    </style>
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
                
                $dsn="mysql:host=$host;dbname=$dbname";
                $conn=new PDO($dsn,$username,$password);
                $sql="SELECT * FROM $table WHERE Nr=:id";
                $stmt=$conn->prepare($sql);
                $stmt->execute([":id"=>$id]);
                $data=$stmt->fetch();


                

            }


    ?>
    <div id="divkryesor">
        <div class="logomenu">
           <img src="service-removebg-preview.png" alt="" class="logo">
        </div>   
        <div class="divb">
            <a href="page2.php"><button class="dashbord"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#36454f" d="M64 256l0-96 160 0 0 96L64 256zm0 64l160 0 0 96L64 416l0-96zm224 96l0-96 160 0 0 96-160 0zM448 256l-160 0 0-96 160 0 0 96zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32z"/></svg>Dashbord</button></a>
            <a href="page1.php"><button class="create"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#36454f" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>Create invoice</button></a>
        </div>

    </div>
    <img src="menu.png" alt="" class="menu" onclick="display()">

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
        <script>
        function display(){

            if(document.getElementById('divkryesor').style.display=="block"){
                document.getElementById('divkryesor').style.display="none"
                document.getElementsByTagName('form')[0].style.marginLeft="300px"
                
            }
            else{
                document.getElementById('divkryesor').style.display="block"
                document.getElementsByTagName('form')[0].style.marginLeft="450px"


            }
        }
        
    </script>

    
</body>
</html>