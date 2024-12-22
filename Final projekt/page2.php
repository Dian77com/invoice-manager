<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <title>Invoice Management System</title>
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
body {
            font-family: Arial, sans-serif;

            background-color: #f4f4f4;
        }



        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 75%;
            border-collapse: collapse;
            margin-top: 60px;
            margin-left:320px;
            font-size:20px;
        }

        table th, table td {
            padding: 7px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .dashbord:hover,.create:hover,.menu:hover{
            box-shadow:0px 0px 3px #36454f;
        }

        table th {
            background-color: #36454f;
            color: white;
        }

        table tr:nth-child(even) {
            background-color:rgb(238, 232, 232);
        }

        table a {
            color: #ff6347;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

        table a:hover {
            background-color: #ddd;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        

        .update,.delete{
            background-color: #4CAF50;
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .update:hover{
            background-color:#4CAF50;
        }
        .create{
            margin-top:20px;
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
        .create{
            margin-top:20px;
        }
        svg{
           width:25px;
           height:25px;
           margin-top:-3px;


        }
        .logomenu{
            display:flex;
            justify-content:space-around;
            
        }

        .divb{
            display:block;
            gap:120px;
            
        }
        a{
            text-decoration:none;
        }
        .logo{
            width: 300px;
            height:300px;
            margin:-40px;
            padding:0px;
        }
        #divkryesor{
            position: fixed;
            width: 300px;
            height:100%;
            background-color:white;
            margin-top:-60px;

        }
        .delete{
            background-color:red;
        }

        .delete:hover {
            background-color:rgb(191, 20, 20);
        }
        .menu{
            width:45px;
            height:45px;
            padding:10px;
            border-radius:100%;
            margin-top:-40px;
            cursor:pointer;
            margin-left:10px;
            position:fixed;


        }
    </style>
</head>
<body>
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


        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crud";
        $table = "tbl1";

        try {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $conn = new PDO($dsn, $username, $password);
            $sql = "SELECT * FROM $table";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();


            echo "<table>
                    <tr>
                       <th>Invoice Number</th>
                       <th>Company Name</th>
                       <th>Address</th>
                       <th>Phone Number</th>
                       <th>Email</th>
                       <th>Product Purchase</th>
                       <th>Quantity</th>
                       <th>Total Price</th>
                       <th>Actions</th>
                    </tr>";
            
            foreach ($data as $a) {
                echo "<tr>
                        <td>{$a['Invoicenr']}</td>
                        <td>{$a['Companyname']}</td>
                        <td>{$a['Addres']}</td>
                        <td>{$a['Phonenumber']}</td>
                        <td>{$a['Email']}</td>
                        <td>{$a['Productpurchase']}</td>
                        <td>{$a['Quantity']}</td>
                        <td>{$a['Totalprice']}</td>
                        <td class='action-buttons'>
                            <a href='delete.php?id={$a['Nr']}' class='delete'>Delete</a>
                            <a href='update.php?id={$a['Nr']}'  class='update'>Update</a>
                        </td>
                      </tr>";
            }

            echo "</table>";
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        <script>
                    function display(){

if(document.getElementById('divkryesor').style.display=="block"){
    document.getElementById('divkryesor').style.display="none"
    document.getElementsByTagName('table')[0].style.marginLeft="230px"

    
}
else{
    document.getElementById('divkryesor').style.display="block"
    document.getElementsByTagName('table')[0].style.marginLeft="320px"


}
}
        </script>
    </div>
</body>
</html>
