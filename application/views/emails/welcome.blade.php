<html>
<head>
<title>Welcome to Penpal News</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#e9e9e9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family:Georgia;">
<style>
    a{
        color:#7db3e0;
    }
</style>
<center bgcolor="#e9e9e9">
    <br/><br/>
<table id="MailContent" width="650" height="574" border="0" cellpadding="0" cellspacing="0" style="background-color:white;font-family:Georgia;">
	<tr>
		<td rowspan="5"  width="40" height="574"></td>
		<td colspan="3" width="577" height="1"></td>
		<td rowspan="5" width="33" height="574"></td>
	</tr>
	<tr>
		<td width="180" height="36"></td>
		<td width="197" height="36">
			<div style="margin-top: -5px;"><img src="<?php echo base_url('/public/images/logo_flat.png') ?>" alt="PenPal News"></div>
		</td>
		<td width="200" height="36"></td>
	</tr>
	<tr>
		<td colspan="3" width="577" height="488" style="color:#5B92E0; font-size:0.9em; font-weight:normal;line-height:1.6em;">
		    <h1 style="color:#5B92E0; font-weight:normal;">Welcome to Penpal News!</h1>
		    
            <p>Thanks for signing up! To get you started, please provide your students with your group code(s) below:</p>
            
            
            <table align="center">  
            @foreach ( $group_codes as $code )                  
              <tr>                                                                                                                                                                                                                                                                                                                                                 
                <td align="center" width="300" bgcolor="#DD712E" style="background: #5B92E0; padding-top: 6px; padding-right: 10px; padding-bottom: 6px; padding-left: 10px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; color: #fff; text-decoration: none; font-family: Helvetica, Arial, sans-serif; display: block;">{{$code}}</td>
              </tr>
            @endforeach
            </table>

            <p>If you have any questions or comments, we'd love to hear from you.  Email us at <a href="mailto:support@penpalnews.com" style="color:#7db3e0;">support@penpalnews.com</a>

            <p>Welcome!<br/>
               Penpal News Team</p>
		</td>
		<!-- end Main Content -->
	</tr>
	<tr>
		<td colspan="3" width="577" height="28"></td>
	</tr>
	<tr>
		<td colspan="3" width="577" height="21"></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
<br />
</center>
</body>
</html>



