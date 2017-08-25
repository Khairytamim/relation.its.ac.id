<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Humas ITS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<style type="text/css">
    html, body {
        background-color: #fff;
        color: #000;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }
</style>
</head>
<body style="margin: 0; padding: 0;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td align="center" bgcolor="#20417f" style="padding: 40px 0 30px 0;">
                <h1 style="color: white">HUMAS ITS</h1>
            </td>
        </tr>
        <tr>
          <td style="padding: 20px 0 30px 0;">
             Email ini menunjukkan bahwa ada pertanyaan baru, untuk melihat pertanyaan dapat melihatnya
             melalui link dibawah:
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
             <table border="0" cellpadding="0" cellspacing="0" width="100%">
             <tr>
              <td>
               <h3>{{urldecode($acara->nama_acara)}}</h3>
              </td>
              <td>
               <h3>{{urldecode($acara->nama_agenda)}}</h3>
              </td>
              <td>
               <h3>{{urldecode($acara->tanggal_mulai)}} {{urldecode($acara->waktu_agenda)}}</h3>
              </td>
             </tr>
             <tr>
              <td style="padding: 20px 0 30px 0;">
               {{ URL::to(route("lihatacara").'?id='. $acara->id_acara) }}
              </td>
             </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffcb10" style="padding: 30px 30px 30px 30px;">
             <table border="0" cellpadding="0" cellspacing="0" width="100%">
             <tr>
                <td width="75%" style="text-align: right;" >
                 <b>&reg; HUMAS ITS, 2017</b><br/>
                </td>
             </tr>
            </table>
            </td>
        </tr>
    </table>
</body>
</html>