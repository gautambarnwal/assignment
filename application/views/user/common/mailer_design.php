

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?= $this->SettingsModel->website_title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<style type="text/css">
		a[x-apple-data-detectors] {color: inherit !important;}
	</style>
	
</head>
<body style="margin: 0; padding: 0;">
	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding: 20px 0 30px 0;">

			<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
				<tr>
					<td align="center" bgcolor="#f5f5f5" style="padding: 40px 0 30px 0;">
						<img src="<?= base_url().$this->SettingsModel->website_logo_url ?>" alt="<?= $this->SettingsModel->website_title ?>" width="200" height="auto" style="display: block;" />
					</td>
				</tr>
				<tr>
					<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
							<tr>
								<td style="color: #153643; font-family: Arial, sans-serif;">
									<h1 style="font-size: 24px; margin: 0;"><?= $mailer_title; ?></h1>
								</td>
							</tr>
							<tr>
								<td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 24px; padding: 20px 0 30px 0;">
									<!-- <p style="margin: 0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.</p> -->
									<?= $mailer_content; ?>
								</td>
							</tr> 
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor="<?= $this->SettingsModel->primary_color_code ?>" style="padding: 30px 30px;">
			    		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
							<tr>
								<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
									<p style="margin: 0;">Copyright © <?= $this->SettingsModel->website_title ?>. <br/> 
								</td>
								 
							</tr>
						</table>
					</td>
				</tr>
			</table>

			</td>
		</tr>
	</table>
</body>
</html>