<?php
include_once "./layouts/header.php";

echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
// print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if (empty($_SESSION['id']) && empty($_SESSION['fname']) && empty($_SESSION['username'])) {
    echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้ กรุณาเข้าสู่ระบบ",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
    exit();
}






?>
<?php

include_once "./controllers/pay.php";

?>
   <link href="./assets/app.css" media="all" rel="stylesheet" />
  <script src="./lib/promptpay-qr.js"></script>
    <script src="./lib/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js" integrity="sha512-Qlv6VSKh1gDKGoJbnyA5RMXYcvnpIqhO++MhIM2fStMcGT9i2T//tSwYFlcyoRRDcDZ+TYHpH8azBBCyhpSeqw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script>
function showUser(str) {
  
  

    $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "./controllers/orderDetail.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   id: str
               },
               //If result found, this funtion will be called.
               success: function(resp) {
                   //Assigning result to "display" div in "search.php" file.
                 
                   $("#display").html(resp).show();
               }
           });
}

function chkFile(file1,id) {

    var file = file1.files[0];
    console.log(id);
    var formData = new FormData();
    formData.append('slip', file);
    formData.append('id', id);

    $.ajax({
    type: "POST",
    url: "./controllers/chkFileType.php",    
    contentType: false,
    processData: false,
    data: formData,
    success: function (data) {

        if (data == 'แนบสลิปสำเร็จ') {
            setTimeout(function() {
                        swal({
                            title: "success",
                            text: data,
                            type: "success",
                            showConfirmButton: false,
                            timer: 1000,
                        }, function(response) {
                            setTimeout(function() {
                            location.reload();
                            }, 100);
                        });
                      }, 500);
        }else{
            setTimeout(function() {
                        swal({
                            title: data,
                            type: "error"
                        }, function() {
                            
                        });
                      }, 1000);
        }
      
      
      }
  });
} 


function setID(id){

    $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "./controllers/setid.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   id: id
               },
               //If result found, this funtion will be called.
               success: function(resp) {
                   //Assigning result to "display" div in "search.php" file.
                //  console.log(resp);
                //    $("#display").html(resp).show();
               }
           });

   
}

function uploade(id) {
    // console.log("dd,",id);
    setID(id);
    var el = document.getElementById("uploadImg");
    if (el) {
        el.click();  
    }
};
</script>

<div class="container mt-5 mb-5">
    <div class="row ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">วิธีการชำระเงิน/แจ้งชำระเงิน</li>
            </ol>
        </nav>
    </div>
    <div class="row mt-1">
        <div class="title">
            <h2 style="color: red; font-weight: bold;">
                รายการที่สั่งซื้อ
            </h2>


        </div>
    </div>

    <div class="row">
    <div class="col-sm-12 col-md-8 ">



        <ol class="list-group list-group-numbered">
            <?php

            $order = $selectOrder->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($order)) {

               
            $i = 0;
                foreach ($order as $row => $item) {    $i += 1; ?>
        
                    <li id="order" value=<?php echo json_encode($order);  ?>  class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fs-6" id="oid"  value=<?php echo count($order);  ?>> หมายเลขสั่งซื้อ :<span  style="font-size: 14; font-weight: 100;"> <?php echo $item['o_id'];  ?></span></div>
                            <div class="fs-6"> ขื่อผู้สั่งซื้อ :<span style="font-size: 14; font-weight: 100;"> <?php echo $item['o_name'];  ?></span></div>
                            <div class="fs-6"> เบอร์ : <span style="font-size: 14; font-weight: 100;"> <?php echo $item['o_phone'] ; ?></span></div>
                            <div class="fs-6"> ที่อยู่ : <span style="font-size: 14; font-weight: 100;"><?php echo $item['o_address'] ; ?></span></div>
                            <div class="fs-6"> อีเมล :<span style="font-size: 14; font-weight: 100;"> <?php echo $item['o_email'];  ?></span></div>
                            <div class="fs-6"> จำนวนที่สั่งซื้อ : <span style="font-size: 14; font-weight: 100;"><?php echo $item['o_qty'] ; ?></span></div>
                            <div class="fs-6"> จำนวนที่ต้องชำระ : <span id="<?php echo $i.'g'; ?>" style="font-size: 14; font-weight: 100;" value=<?php echo number_format($item['o_total'],2) ?>><?php echo number_format($item['o_total'],2) ;  ?> ฿ </span></div>
                            <div class="fs-6"> สถานะ :<span style="font-size: 14; font-weight: 100;"> <?php echo $item['status'] ; ?></span></div>
                            <div class="fs-6"> วันที่สั่งซื้อ :<span style="font-size: 14; font-weight: 100;"> <?php echo $item['created_at'] ; ?></span></div>
                            <div class="fs-6"> PromptPay Scan จ่าย :<span style="font-size: 14; font-weight: 100;"> 
                              <div id="<?php echo $i; ?>" style="border-style: dashed;  display: flex; padding:10px; border-color: #92a8d1;"></div>
                          


</span></div>


                          
                        </div>
                        <div>
                            <div>
                        <span class="badge bg-warning rounded-pill"> สถานะ : <?php echo $item['status'];  ?></span><br>
                     
                        <span class="badge bg-warning rounded-pill mt-2"> เลขพัสดุ : <?php echo $item['track'];  ?></span><br>
                        <span class="badge bg-danger rounded-pill mt-2" style="cursor: pointer;"  data-bs-toggle="modal" data-bs-target="#staticDetail" onclick="showUser(<?php echo $item['o_id'] ; ?>)"> ดูรายละเอียด  </span></div> 
                        <label for="uploadImg" class="badge bg-secondary rounded-pill mt-2" style="cursor: pointer;" onclick=" setID(<?php echo  $item['o_id']; ?>)"><i class="fa fa-file-image"></i> แนบสลิป ( Click )</label><br>
                        
                        <input type="file" class="form-control form-control-file" id="uploadImg" name="slip" accept="image/*"  style="display:none" onchange="chkFile(this, <?php echo $item['o_id'] ; ?>)">
                   
                        <?php if( $item['slip']){ ?> 
                            <img src="./admin/uploads/<?php echo $item['slip'] ; ?>" class="card-img-top mt-2" alt="..." style="height: 100px; width: 100px; object-fit: cover;" >
                            <?php  }else {?> 

                              <div   style="border-style: dashed;  display: flex; width: 100px; height: 100px; align-items: center;    margin-right: 20px;" class="mt-2 text-center" onclick="uploade(<?php echo  $item['o_id']; ?>)">
                              <i class="fas fa-camera "style="margin: auto;" ></i>
                            </div>
                                <?php    } ?> 
                        
                       
                        </div>
                    </li>
            <?php }
            }   ?>

        </ol>
  
    </div>
    <div class="col-sm-12 col-md-4 ">   
       
        <div class="list-group ">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">วิธีการชำระเงิน
                    </h5>
                  
                </div>
             
            </a>
          
            <a href="#" class="list-group-item list-group-item-action">
               

                <?php

                $pay = $selectBank->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($pay)) {

                    foreach ($pay as $row => $item) { ?>
                        <img src="./admin/uploads/<?php echo $item['bank_logo']  ?>" alt="..." width="100" height="100">
                        <p class="ctname mt-3">ชื่อธนาคาร: <?php echo $item['bank_name']  ?></p>
                        <p class="ctname">เลขบัญชี: <?php echo $item['bank_account']  ?></p>
                        <p class="ctname">ชื่อบัญชี: <?php echo $item['bank_account_name']  ?></p>
                        <hr>

                <?php }
                }   ?>
            </a>
        
    </div>
</div>
  </div>




 
</div>



<!-- Modal -->
<div class="modal fade" id="staticDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticDetaildropLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(241,155,255,1);">
        <h5 class="modal-title" id="staticDetaildropLabel">รายเอียดสินค้า</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="display">

        </div>
      </div>
     
    </div>
  </div>
</div>













<script type="text/javascript">
                                
                                // get QR-dom
                                var qr_doms =document.getElementById("oid").getAttribute("value");
                          
                                var orders = document.getElementById('order').getAttribute("value");
                               
                               
                                var qr_dom = 1;

                                for (let j = 0; j < qr_doms ; j++) {
                      
                                    qr_dom = j+1;
                        
                                    render_qr()
                                    
                                }
                        //    alert(qr_dom)
                                // render QR function
                                function render_qr(){
                                  
                                  // var acc_id = document.getElementById('acc_id').value;
                                  var acc_id = '0884092629';
                                  var amount = document.getElementById(qr_dom+'g').getAttribute("value");
                                  var txt = PromptPayQR.gen_text(acc_id, parseFloat(amount.replace(/,/g, '')));
                               
                                  qr_dom.innerHTML = "";
                                  if(txt){
                                    new QRCode(qr_dom.toString(), txt);
                                  }
                                }
                          
                                // download function
                                // https://stackoverflow.com/a/46406124/466693
                                function dataURItoBlob(dataURI) {
                                  // convert base64 to raw binary data held in a string
                                  // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
                                  var byteString = atob(dataURI.split(',')[1]);
                          
                                  // separate out the mime component
                                  var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]
                          
                                  // write the bytes of the string to an ArrayBuffer
                                  var ab = new ArrayBuffer(byteString.length);
                          
                                  // create a view into the buffer
                                  var ia = new Uint8Array(ab);
                          
                                  // set the bytes of the buffer to the correct values
                                  for (var i = 0; i < byteString.length; i++) {
                                      ia[i] = byteString.charCodeAt(i);
                                  }
                          
                                  // write the ArrayBuffer to a blob, and you're done
                                  var blob = new Blob([ab], {type: mimeString});
                                  return blob;
                          
                                }
                                function download() {
                            
                                  // find b64
                                  let b64 = document.getElementsByTagName('img')[0].src;
                                  alert("b64",b64)
                                  if (!b64) b64 = document.getElementsByTagName('canvas')[0].toDataURL();
                                  if (!b64) {
                                    alert("Cannot find QR Image");
                                    return;
                                  }
                                  // build blob
                                  let blob = dataURItoBlob(b64);
                                  // download image
                                  saveAs(blob, "download.png");
                                }
                          
                                // bind acc_id, amount, download
                                // document.getElementById('acc_id').addEventListener('keyup', render_qr, true);
                                // document.getElementById('amount').addEventListener('keyup', render_qr, true);
                   
                          
                                // preview qr
                                // render_qr();
                             
                          
                              </script>














<?php

include_once "./layouts/footer.php"

?>