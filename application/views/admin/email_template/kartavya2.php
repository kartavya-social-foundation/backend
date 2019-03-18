<div style="width:100%; margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
<style>
body{ font-family: raleway,sans-serif; }
</style>
<table border="0" cellpadding="0" cellspacing="0" style="line-height:100% !important; margin:0; padding:0; width:100%">
  <tbody>
    <tr>
      <td><!-- edge wrapper -->
      <figure>
      <table align="center" border="0" cellpadding="0" cellspacing="0" style="background:#f4f4f4; width:600px">
        <tbody>
          <tr>
            <td><!-- content wrapper -->
            <figure>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="background:#fcfcfc; width:560px">
              <tbody>
                <tr>
                  <td style="vertical-align:top"><!-- ///////////////////////////////////////////////////// -->
                  <figure>
                  <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="vertical-align:middle"><img alt="Kartavya" src="<?php echo base_url();?>uploads/template_img/kartavya.png" title="Kartavya" /></td>
                      </tr>
                    </tbody>
                  </table>

                  <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="vertical-align:top;">
                        <figure style="margin: 0px;">
                        
                        <p style="margin-bottom: 20px; margin-top: 40px; font-family: raleway,sans-serif; color: #00796b;">Jai Bhim <?php if(isset($username)) { echo $username;}?>,</p>
                        </figure>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <figure style="margin: 0px;">
                        <p style="color: #606061;text-align: justify;
                        font-family:Raleway,sans-serif;
                        font-size: 14px;line-height: 1.33;">We received a request to reset the password associated with this e-mail address. If you made this request, please follow the instructions below.</p>
                        <p style="color: #606061; text-align: justify;
                        font-family:Raleway,sans-serif;
                        font-size: 14px;line-height: 1.33;">Click on the link below to reset your password using our secure server:</p>
                        </figure>
                        </td>
                        </tr>
                         <tr>
                            <td style=" vertical-align:middle"><a style="margin-top: 20px; margin-bottom: 20px; display:block;" href="<?php echo $url;?>" onclick="checklink()"><?php echo $url;?></a></td>
                            </tr>
                            <tr>
                            <td>
                            <figure style="margin: 0px;">
                        <p style="color: #606061;text-align: justify;
                        font-family:Raleway,sans-serif;
                        font-size: 14px;line-height: 1.33;">If you did not request to have your password reset you can safely ignore this email. Rest assured your account is safe.</p>
                        <p style="color: #606061;text-align: justify;
                        font-family:Raleway,sans-serif;
                        font-size: 14px;line-height: 1.33;">If clicking the link does not seem to work, you can copy and paste the link into your browser's address window, or retype it there. Once you have returned to kartavya we will give instructions for resetting your password.</p>
                        <p style="color: #606061;text-align: justify;
                        font-family:Raleway,sans-serif;
                        font-size: 14px;line-height: 1.33;">Kartavya Team will never e-mail you and ask you to disclose or verify your Account password, credit card, or banking account number. If you receive a suspicious e-mail with a link to update your account information, do not click on the link--instead, report the e-mail to Amazon for investigation. </p>
                        </figure>
                        </td>
                      </tr>
                      <!-- <tr>
                        <td style="vertical-align:middle"><a href="{verify_link}">Click Here To Verify Email</a></td>
                      </tr>
                      <tr>
               -->          <td style="vertical-align:bottom">
                        <figure style="margin: 0px;">
                        <hr>

                        <span style="color: #606061; display: block; padding-top: 20px; padding-bottom: 2px; line-height: 18px; font-family: raleway,sans-serif;font-size: 14px;">Jai Bhim</span>

                        <span style="color: #606061; display: block; padding-bottom: 2px; line-height: 18px; font-family: raleway,sans-serif;font-size: 14px;">Admin Team,</span>

                        <span style="color: #606061; display: block; padding-bottom: 10px; line-height: 18px; font-family: raleway,sans-serif;font-size: 14px;">Kartavya</span>
                        <img src="<?php echo base_url();?>uploads/template_img/kartavyasm.png" title="Kartavya" alt="Kartavya" />
                        </figure>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:bottom">
                        <figure style="margin: 0px;">
                        <span style="display: block; padding-bottom: 10px; line-height: 18px; font-size:12px; text-align:center; color:#adadad; padding-top:0px;">&copy; <?php echo date('Y'); ?> Kartavya All rights reserved.</span>
                        </figure>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </figure>
                  <!-- //////////// --></td>
                </tr>
              </tbody>
            </table>
            </figure>
            <!-- / content wrapper --></td>
          </tr>
        </tbody>
      </table>
      </figure>
      <!-- / edge wrapper --></td>
    </tr>
  </tbody>
</table>
</div>
<script type="text/javascript">
 function checklink() 
 {
        $.ajax({
          type:"POST",
           url:"<?php echo base_url('forget/checkstatus')?>/",
           data:str,
           success:function(data)
           {  
               if(data==1000)
               {
                    location.reload();
               }
           }
        });
   
 }
  
</script>
