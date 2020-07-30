<div class="col-md-8">
    <h3 align="center">Xabar yuborish</h3>
    <form id="form-contact" method="post" class="clearfix ts-form ts-form-email" action="php/email.php">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="form-contact-name">F.I.O *</label>
                    <input type="text" class="form-control" id="form-contact-name" name="name" placeholder="F.I.O" required>
                </div>
                <!--end form-group -->
            </div>
            <!--end col-md-6 col-sm-6 -->
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="form-contact-email">Email *</label>
                    <input type="email" class="form-control" id="form-contact-email" name="email" placeholder="Elektron manzil" required>
                </div>
                <!--end form-group -->
            </div>
            <!--end col-md-6 col-sm-6 -->
        </div>
        <!--end row -->
        <div class="form-group">
            <label for="form-contact-subject">Mavzu *</label>
            <input type="text" class="form-control" id="form-contact-subject" name="subject" placeholder="Mavzuni ko'rsating" required>
        </div>
        <!--end form-group -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form-contact-message">Xabar *</label>
                    <textarea class="form-control" id="form-contact-message" rows="5" name="message" placeholder="Xabaringizni qoldiring" required></textarea>
                </div>
                <!--end form-group -->
            </div>
            <!--end col-md-12 -->
        </div>
        <!--end row -->
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary float-right ts-btn-arrow"  name="submit" id="form-contact-submit">Yuborish</button>
        </div>
        <!--end form-group -->
        <div class="form-contact-status">
          <?php if($_GET['status'] == "success"){
            echo '<p style="color: green;">Xabaringiz muoffaqiyatli yuborildi</p>';
          } else {
            echo'<p style="color: red;"> Kechirasiz, xabar yuborishda muammolar paydo bo\'ldi</p>';
          }?>
        </div>
    </form>
    <!--end form-contact -->
</div>
