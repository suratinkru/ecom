


    <?php

    //print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
    //ถ้ามีค่าส่งมาจากฟอร์ม
    if (
        isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confpassword']) && isset($_POST['fname']) && isset($_POST['lname'])
        && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address'])
    ) {
        // sweet alert 
        echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

        //ไฟล์เชื่อมต่อฐานข้อมูล
        require_once '../config/connectdb.php';
        //ประกาศตัวแปรรับค่าจากฟอร์ม
        $username = $_POST['username'];
        $confpassword = $_POST['confpassword'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $password = sha1($_POST['password']); //เก็บรหัสผ่านในรูปแบบ sha1 

        //check confirm password

        if ($_POST['password'] === $confpassword) {
            //check duplicat
            $stmt = $conn->prepare("SELECT id FROM tbl_member WHERE username = :username");
            //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
            $stmt->execute(array(':username' => $username));
            //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
            if ($stmt->rowCount() > 0) {
                echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Username ซ้ำ !! ",  
                            text: "กรุณาสมัครใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "../register.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
            } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
                //sql insert
                $stmt = $conn->prepare("INSERT INTO tbl_member (username, password, fname, lname,phone,email,address)
              VALUES (:username, :password, :fname, :lname, :phone, :email, :address)");
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
                $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
                $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':address', $address, PDO::PARAM_STR);
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "สมัครสมาชิกสำเร็จ",
                            text: "กรุณารอระบบ Login ใน Workshop ต่อไป",
                            type: "success"
                        }, function() {
                            window.location = "../login.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
                } else {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function() {
                            window.location = "../register.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
                }
                $conn = null; //close connect db
            } //else chk dup
        } else {
            echo '<script>
            setTimeout(function() {
             swal({
                 title: "เกิดข้อผิดพลาด รหัสผ่านไม่ตรงกัน",
                 type: "error"
             }, function() {
                
            
                window.location = "../register.php";
              
             });
           }, 1000);
       </script>';
        }
    } //isset 
    //  window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
    ?>
