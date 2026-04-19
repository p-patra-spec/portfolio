<?php include 'db.php'; ?>

<h2>All Orders</h2>

<table border="1" cellpadding="10">
<tr>
<th>Name</th><th>Phone</th><th>Product</th><th>Price</th><th>Date</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT * FROM orders");

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>".$row['name']."</td>
    <td>".$row['phone']."</td>
    <td>".$row['product']."</td>
    <td>".$row['price']."</td>
    <td>".$row['order_date']."</td>
    </tr>";
}
?>
</table>
