<?php 
if(!isset($_SESSION["id"]))
{
    echo "<script>
    window.location='login';
    </script>";
}
?>

<section id="content">
    <div class="card mt-5 container p-5">
    <div class="card-header bg-white"><h4><span>My Cart(1 item)</span></h2></h4></div>
    <div class="card-body">
    
        <table class="table table-responsive">

        <?php 
       foreach($shwcrt as  $row)
       {
        ?>
            <tr align="center">
               
                <!-- <td><img src="admin/" style="width:150px; height:150px"></td> -->
                <td><?php echo $row["coursename"];?></td>
                <td><?php echo $row["first_name"];?></td>
             
                <td><input type="number" name="qty" min="1" max="10" value="1" class="form-control w-25"></td>
                <td><?php echo $row["subtotal"];?></td>
                <td><a href="<?php echo $mainurl;?>view-cart?delete-cart-id=<?php echo $row["cart_id"];?>" onclick="return confirm('Are you sure to delete Cart?')"><i class="bi bi-trash fs-4 text-danger"></i></td>
            </tr>
            <?php 
       }
       ?>
        </table>
    
    
    </div>
    <div class="card-footer bg-white shadow p-3">
    
        <div class="row">
            <div class="col-md-7">
                <p><i class="bi bi-geo-alt fs-2"></i> Delivery pin code</p>
                <div class="input-group p-1 w-50">
                    <input type="text" name="pincode" placeholder="Enter your pincode" class="form-control">
                    <span class="input-group-text bg-primary text-white">Submit</span>
    
    </div> 
    </div>

    <div class="col-md-5">
            
        
    <h4>Total₹   <span class="float-end fs-6"><?php echo  $totalamount[0]["sum_total"]; ?> </span></h4>

    <b>Grand Total₹ <span class="float-end"> <?php echo  $totalamount[0]["sum_total"]; ?> </span></b>
    <p>Inclusive of all the applicable taxes</p>
    
    <p><a href="<?php echo $mainurl;?>checkout-here" onclick="return confirm('Are you sure to checkout for place Order ?')"><button type="button" name="checkout" class="btn btn-primary text-white btn-lg w-100">Checkout</button></a></p>
    </div>
   

</div>
</div>
    </div>
    </div>
    </section>
                    