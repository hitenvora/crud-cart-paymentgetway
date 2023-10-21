<?php 
class model 
{
    public $connection="";
    public function __construct()
    {
        session_start();
        try 
        {
        $this->connection=new mysqli("localhost","root","","php_prectices");
    //   echo "conntection succesfully";
        }
        catch(Exception $e)
        {
            die(mysqli_error($this->connection));
        }

    }   
    // fetch all data create a member functions
    public function selectalldata($table)
    {
        $select="select * from $table";
        $exe=mysqli_query($this->connection,$select);
        while($fetch=mysqli_fetch_array($exe))
        {
            $arr[]=$fetch;
        }
        return $arr;
    }
    // create a member function for select category and display its products
    public function selectdetails($table,$column,$id)
    {
        $select="select * from $table where $column='$id'";
        $exe=mysqli_query($this->connection,$select);
        while($fetch=mysqli_fetch_array($exe))
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

      // fetch and join data create a member functions
      public function joindata($table,$table1,$table2,$table3,$where,$where1,$where2)
      {
          $select="select * from $table join $table1 on $where join $table2 on $where1 join $table3 on $where2";
          $exe=mysqli_query($this->connection,$select);
          while($fetch=mysqli_fetch_array($exe))
          {
              $arr[]=$fetch;
          }
          return $arr;
      }


       // fetch and join data create a member functions
       public function manageprofiledata($table,$table1,$table2,$table3,$where,$where1,$where2,$column,$id)
       {
           $select="select * from $table join $table1 on $where join $table2 on $where1 join $table3 on $where2 where $column='$id'";
   $exe=mysqli_query($this->connection,$select); 
           while($fetch=mysqli_fetch_array($exe))
           {
               $arr[]=$fetch;
           }
           return $arr;
       
    }
    public function insalldata($table,$data)
    {
        $column=array_keys($data);
        $column1=implode(",",$column);

        $value=array_values($data);
        $value1=implode("','",$value);
    //    echo  $insert="insert into $table($column1) values('$value1')"; exit();
       $insert="insert into $table($column1) values('$value1')";
        $exe=mysqli_query($this->connection,$insert);
        return $exe;
    }
    // create a member function for admin login
    public function userlogin($table,$em,$pass)
    {
        $sel="select * from $table where email='$em' and password='$pass'";
        $exe=mysqli_query($this->connection,$sel);
        $fetch=mysqli_fetch_array($exe);
        $no_rows=mysqli_num_rows($exe);
        if($no_rows==1)
        {
          $_SESSION["id"]=$fetch["id"];
          $_SESSION["email"]=$fetch["email"];
          $_SESSION["fnm"]=$fetch["first_name"];
          return true;
        }
        else 
        {   
        return false;
        }
    } 

    // create a member function for forgetpassword
    public function frgpassword($table,$column,$em)
    {
          $select="select password from $table where $column='$em'";
          $exe=mysqli_query($this->connection,$select);
          $fetch=mysqli_fetch_array($exe);
          $no_rows=mysqli_num_rows($exe);
          if($no_rows==1)
          {
            $pass=base64_decode($fetch["password"]);
            return $pass; 
          }
          else 
          {
            return false;
          }

    }
    // change password create a member function
    public function changepassworddata($table,$opass,$npass,$cpass,$column,$id)
    {
        $id=$_SESSION["id"];
        $select="select password from $table where $column='$id'";
        $exe=mysqli_query($this->connection,$select);
        $fetch=mysqli_fetch_array($exe);
        $pass=$fetch["password"];
        if($pass==$opass && $npass==$cpass)
        {
            $upd="update $table set password='$npass' where $column='$id'";
            $exe=mysqli_query($this->connection,$upd);
            return $exe;

        }

        else 
        {
           return false;
        }


    }


// checkout page conform order
public function confirmorder($table,$column,$id)
{

}


    // delete a data for users create a member function
    public function deletedata($table,$id)
    {
        $column=array_keys($id);
        $column1=implode(",",$column);

        $value=array_values($id);
        $value1=implode("','",$value);

        $delete="delete from $table where $column1='$value1'";
        $exe=mysqli_query($this->connection,$delete);
        return $exe;
    }

    // update a data for users create a member function
    public function updatedata($table,$path,$em,$mob,$course,$st,$ct,$column,$id)
    {

        $id=$_SESSION["id"];
        $update="update $table set image='$path',email='$em',phone='$mob',course_id='$course',state_id='$st',city_id='$ct' where $column='$id'";
        $exe=mysqli_query($this->connection,$update);
        return $exe;
    }


  // create a member function for subtotal of products
  public function subtotalscrt($table,$column,$column1,$id)
  {
      $select="select sum($column) as sum_total from $table where $column1='$id'";
      $exe=mysqli_query($this->connection,$select);
      while($fetch=mysqli_fetch_array($exe))
      {
          $arr[]=$fetch;
      }
      return $arr;

  }


     // create a member function for select count total of added in cart by customer
     public function selectcount($table,$column,$column1,$id)
     {
         $select="select count($column) as total from $table where $column1='$id'";
         $exe=mysqli_query($this->connection,$select);
         while($fetch=mysqli_fetch_array($exe))
         {
             $arr[]=$fetch;
         }
         return $arr;
     }

     //create a member function for viewcart as student added 
      public function viewcrt($table,$table1,$table2,$where,$where1,$column,$id)
      {
        $select="select * from $table  join $table1 on $where join $table2 on $where1 where $table2 .   $column='$id'";
        $exe=mysqli_query($this->connection,$select);
        while($fetch=mysqli_fetch_array($exe))
        {
            $arr[]=$fetch;
        }
        return $arr;
      }

    // logout here to create a member function 
    public function logout()
    {
        unset($_SESSION["id"]);
        unset($_SESSION["email"]);
        unset($_SESSION["fnm"]);
        session_destroy();
        return true;
    }
     
}
?>