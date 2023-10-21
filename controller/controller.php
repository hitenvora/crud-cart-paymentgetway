    <?php
    error_reporting(0);
    require_once("model/model.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class controller extends model
    {
        public function __construct()
        {
            parent::__construct();
            // fetch course in add students 
            $shw = $this->selectalldata('tbl_sirtask1');
            // join and show all students list in show students data
            $jointable = $this->joindata('tbl_sirtask', 'tbl_sirtask1', 'state_name', 'city_name', 'tbl_sirtask.course_id=tbl_sirtask1.course_id', 'tbl_sirtask.state_id=state_name.state_id', 'tbl_sirtask.city_id=city_name.city_id');


            // profile manage here
            if (isset($_SESSION["id"])) {
                $id = $_SESSION["id"];
                $prof = $this->manageprofiledata('tbl_sirtask', 'tbl_sirtask1', 'state_name', 'city_name', 'tbl_sirtask.course_id=tbl_sirtask1.course_id', 'tbl_sirtask.state_id=state_name.state_id', 'tbl_sirtask.city_id=city_name.city_id', 'id', $id);
            }
            // fetch state in add student view 
            $shwstate = $this->selectalldata('state_name');
            // fetch city in add student view 
            $shwcity = $this->selectalldata('city_name');
            // insert addstudents data in tables 
            if (isset($_POST["addstudent"])) {
                require_once("PHPMailer/PHPMailer.php");
                require_once("PHPMailer/SMTP.php");
                require_once("PHPMailer/Exception.php");

                date_default_timezone_set("Asia/Calcutta");
                $fnm = $_POST["fnm"];
                $lnm = $_POST["lnm"];
                $em = $_POST["em"];
                $pwd = ($_POST["password"]);
                // upload photo or images or file
                $tmp_name = $_FILES["img"]["tmp_name"];
                $path = "uploads/students/" . $_FILES["img"]["name"];
                move_uploaded_file($tmp_name, $path);
                $gender = $_POST["gender"];
                $hobby = implode(",", $_POST["chk"]);
                $phone = $_POST["phone"];
                $course = $_POST["course"];
                $st = $_POST["state"];
                $ct = $_POST["city"];
                $rdt = date("d/m/Y H:i:s a");

                try {

                    $mail = new PHPMailer(true);
                    //Server settings
                    $mail->SMTPDebug = false;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'hitenvora5666@gmail.com';                     //SMTP username
                    $mail->Password   = 'atszrqsmbenrzbfr';                               //SMTP password
                    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    //Recipients
                    $mail->setFrom('hitenvora5666@gmail.com', 'Mail sending');
                    $mail->addAddress($_POST["em"], 'Thanks for Create Account with Us');     //Add a recipient
                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'Thanks note to Create account with us!';
                    $mail->Body = "Teachers are the building blocks of society. Teachers play a pivotal role in molding the character of students. We don’t have to wait until a Teacher’s Day or a Teacher’s Appreciation Week to give thank you notes for them. The teachers toil for the success of the students. So, it is important that we spend at least a minute to let them know how much we appreciate their roles in shaping our lives. So let’s have a look at 30 teacher thank you notes that could be a handful at the time we appreciate them" . "<br>" . "<img src='https://www.wishesmsg.com/wp-content/uploads/Thank-You-Message-to-Student.jpg'>";

                    $mail->send();
                } catch (Exception $e) {
                    echo "Somthing went wrong";
                }
                $data = array(
                    "first_name" => $fnm, "last_name" => $lnm, "email" => $em, "password" => $pwd, "image" => $path, "gender" => $gender,
                    "hobbies" => $hobby, "phone" => $phone, "course_id" => $course, "state_id" => $st, "city_id" => $ct, "date_time" => $rdt
                );
                $chk = $this->insalldata('tbl_sirtask', $data);
                if ($chk) {
                    echo "<script>
                alert('Thanks for adding students data')
                window.location='./';
                </script>";
                } else {
                    echo "<script>
    alert('Somthing is wrong')
    window.location='./';
    </script>";
                }
            }


            // login as students 
            if (isset($_POST["log"])) {
                $em = $_POST["email"];
                $pass = ($_POST["password"]);
                $log = $this->userlogin('tbl_sirtask', $em, $pass);
                if ($log) {
                    echo "<script>
                alert('You are Logged in Successfully')
                window.location='manage-profile';
                </script>";
                } else {
                    echo "<script>
                alert('You email and password are wrong')
                window.location='./';
                </script>";
                }
            }
            // forget password logic

            if (isset($_POST["frg"])) {
                require_once("PHPMailer/PHPMailer.php");
                require_once("PHPMailer/SMTP.php");
                require_once("PHPMailer/Exception.php");
                $em = $_POST["email"];

                $chk = $this->frgpassword('tbl_sirtask', 'email', $em);
                if ($chk) {
                    echo "<script>
                alert('Your password is :'$chk')
                window.location='login';
                </script>";
                } else {
                    echo "<script>
                alert('Sorry this email does not exist try again')
                window.location='forget-password';
                </script>";
                }


                try {

                    ob_start();
                    // error_reporting(0);
                    $mail = new PHPMailer(true);
                    //Server settings
                    $mail->SMTPDebug = false;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'hitenvora5666@gmail.com';                     //SMTP username
                    $mail->Password   = 'atszrqsmbenrzbfr';                               //SMTP password
                    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom($_POST["email"], 'Mail sending');
                    $mail->addAddress($_POST["email"], 'Forget Password');     //Add a recipient

                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'Contact with Us email sending data';
                    $chk = $this->frgpassword('tbl_sirtask', 'email', $em);
                    $mail->Body = "The password is :" . $chk;
                    $mail->send();

                    if ($chk) {
                        echo "<script>
                  alert('we will successfully send your password in your email please checked and logged in again!')
                  window.location='login';
                  </script>";
                    } else {
                        echo "<script>
                    alert('This email does not exist try with another registered email Id')
                    window.location='forget-password';
                    </script>";
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }

            // /change password here
            if (isset($_POST["changepass"])) {
                $id = $_SESSION["id"];
                $opass = ($_POST["opass"]);
                $npass = ($_POST["npass"]);
                $cpass = ($_POST["cpass"]);
                $chk = $this->changepassworddata('tbl_sirtask', $opass, $npass, $cpass, 'id', $id);
                if ($chk) {
                    unset($_SESSION["id"]);
                    unset($_SESSION["email"]);
                    unset($_SESSION["fnm"]);
                    session_destroy();
                    echo "<script>
                alert('Your password successfully changed')
                window.location='login';
                </script>";
                } else {
                    echo "<script>
                alert('Your opass,npassword and confirmed password does not matched try again')
                window.location='change-password';
                </script>";
                }
            }


            //chekout delete cart items

            if (isset($_GET["checkout"])) {
                $did = $_GET["checkout"];
                $id = array("cart_id" => $did);
                $chk = $this->deletedata('add_to_cart', $id);
                if ($chk) {
                    echo "your cart succesfully delete";
                }
            }


            // delete a data
            if (isset($_GET["deldata"])) {
                $delid = $_GET["deldata"];
                $id = array("id" => $delid);
                $chk = $this->deletedata('tbl_sirtask', $id);
                if ($chk) {
                    unset($_SESSION["id"]);
                    unset($_SESSION["email"]);
                    unset($_SESSION["fnm"]);
                    session_destroy();
                    echo "<script>
                alert('Your profile removed successfully')
                window.location='login';
                </script>";
                }
            }

            // update data 
            if (isset($_POST["upd"])) {
                $id = $_SESSION["id"];
                // upload photo or images or file
                $tmp_name = $_FILES["img"]["tmp_name"];
                $path = "uploads/students/" . $_FILES["img"]["name"];
                move_uploaded_file($tmp_name, $path);
                $em = $_POST["email"];
                $mob = $_POST["phone"];
                $course = $_POST["course"];
                $st = $_POST["state"];
                $ct = $_POST["city"];
                $chk = $this->updatedata('tbl_sirtask', $path, $em, $mob, $course, $st, $ct, 'id', $id);
                if ($chk) {
                    echo "<script>
                alert('Your profile updated successfully')
                window.location='manage-profile';
                </script>";
                }
            }
            // fetch data or all course category
            $shwcourse = $this->selectalldata('course_cetegory');
            // fetch all course list data
            $shwcourselist1 = $this->selectalldata('tbl_sirtask1');
            $shwcourselist = $this->selectalldata('course_list');
            $showsirtask = $this->selectalldata('tbl_sirtask');
            $showcart = $this->selectalldata('add_to_cart');
            //select course category of products 


            // add course in cart
            if (isset($_POST["addtocart"])) {
                date_default_timezone_set("asia/calcutta");

                $id = $_SESSION["id"];
                $coid = $_POST["coid"];
                $subtotal = $_POST["subtotal"];
                $date = date("d/m/Y h:i:s a");
                $data = array("co_id" => $coid, "id" => $id, "subtotal" => $subtotal, "added_date" => $date);
                $chk = $this->insalldata('add_to_cart', $data);

                if ($chk) {
                    echo "<script>
                alert('Your Course successfully added in your Cart')
                window.location='view-cart';
                </script>";
                }
            }



            // delete cart from cart which is added by  added
            if (isset($_GET["delete-cart-id"])) {
                $did = $_GET["delete-cart-id"];
                $id = array("cart_id" => $did);
                $chk = $this->deletedata('add_to_cart', $id);
                if ($chk) {
                    echo "<script>
          alert('Your cart successfully Deleted')
          window.location='view-cart';
          </script>";
                }
            }
            //subtotal of sum total of cart in view cart 
            if (isset($_SESSION["id"])) {
                $id = $_SESSION["id"];
                $totalamount = $this->subtotalscrt('add_to_cart', 'subtotal', 'id', $id);
            }

            $id = $_SESSION["co_id"];
            $addtocart = $this->selectdetails('course_list', 'co_id', $id);




            // select count cart after login as customer
            if (isset($_SESSION["id"])) {
                $id = $_SESSION["id"];
                $totalcartcount = $this->selectcount('add_to_cart', 'cart_id', 'id', $id);
            }

            // view all cart items added by students

            if (isset($_SESSION["id"])) {
                $id = $_SESSION["id"];
                $shwcrt = $this->viewcrt('add_to_cart', 'course_list', 'tbl_sirtask', 'add_to_cart.co_id=course_list.co_id', 'add_to_cart.id=tbl_sirtask.id', 'id', $id);
            }

            // logout as a users
            if (isset($_GET["logout-here"])) {
                $log = $this->logout();
                if ($log) {
                    echo "<script>
                alert('You are Logout Successfully')
                window.location='./';
                </script>";
                }
            }
            // load views 
            if (isset($_SERVER["PATH_INFO"])) {
                switch ($_SERVER["PATH_INFO"]) {
                    case '/':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("showdata.php");
                        require_once("footer.php");
                        require_once("addstudent.php");
                        break;

                    case '/login':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("login.php");
                        require_once("footer.php");
                        require_once("addstudent.php");
                        break;

                    case '/manage-profile':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("manageprofile.php");
                        require_once("footer.php");
                        break;
                    case '/forget-password':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("forgetpassword.php");
                        require_once("footer.php");
                        break;

                    case '/change-password':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("changepassword.php");
                        require_once("footer.php");
                        break;

                    case '/course-list-data':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("courselist.php");
                        require_once("footer.php");
                        break;
                    case '/course-details':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("coursedetails.php");
                        require_once("footer.php");
                        break;

                    case '/view-cart':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("viewcart.php");
                        require_once("footer.php");
                        break;

                    case '/checkout-here':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("checkout.php");
                        require_once("footer.php");
                        break;


                    case '/paymentfailure':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("paymentfailure.php");
                        require_once("footer.php");
                        break;


                    case '/paymentsuccess':
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("paymentsuccess.php");
                        require_once("footer.php");
                        break;



                    default:
                        require_once("index.php");
                        require_once("header.php");
                        require_once("navigations.php");
                        require_once("404.php");
                        require_once("footer.php");
                        break;
                }
            }
        }
    }

    $obj = new controller;
    ?>









