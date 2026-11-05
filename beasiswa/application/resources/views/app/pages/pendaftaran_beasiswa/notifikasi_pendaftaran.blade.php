<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.a {
  color: #0F0;
}
.a {
  color: #30F;
  font-weight: bold;
}
.as {
  color: #FFF;
  text-align: center;
}
.as {
  color: #FFF;
}
.paragraf p {
  text-align: justify;
}
</style>
</head>

<body>
<div align="center">
  <p><font size="4" class="a">Laporan Pendaftar Beasiswa Koperasi Astra <br />
    {{$datapendaftar->NM_PERUSAHAAN}}</font></p>
  <div class="paragraf">
    <p>E-mail ini dikirim otomatis oleh sistem beasiswa KAI ,berikut data yang dilampirkan adalah laporan pendaftar beasiswa masuk,<br/> HRD / Personalia dapat menyetujui formulir beasiswa anggota melalui Direct Link Approval di bawah ini :</p>
    <p><b>Link Approval :</b> <a href="http://adm-beasiswa.koperasi-astra.com/formulir_masuk/{{$datapendaftar->NO_ANGGOTA}}">
      http://adm-beasiswa.koperasi-astra.com/formulir_masuk/{{$datapendaftar->NO_ANGGOTA}}</a><br />
    </p>
  </div>
<hr />
  <div class="body">
    <table width="1114" height="168" border="0">
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" bgcolor="#339900" class="as">DATA ANGGOTA</td>
        <td>&nbsp;</td>
        <td colspan="3" bgcolor="#339900" class="as">DATA ANAK</td>
      </tr>
      <tr>
        <td width="9">&nbsp;</td>
        <td width="135">No Anggota</td>
        <td width="6">:</td>
        <td width="348">{{$datapendaftar->NO_ANGGOTA}}</td>
        <td width="10">&nbsp;</td>
        <td width="149">Nama Anak</td>
        <td width="9">:</td>
        <td width="417">{{$datapendaftar->NM_ANAK}}</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Nama Anggota</td>
        <td>:</td>
        <td>{{$datapendaftar->NM_ANGGOTA}}</td>
        <td>&nbsp;</td>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{$datapendaftar->JENKEL}}</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>NPK</td>
        <td>:</td>
        <td>{{$datapendaftar->NPK}}</td>
        <td>&nbsp;</td>
        <td>Nama Sekolah</td>
        <td>:</td>
        <td>{{$datapendaftar->NM_SKL}}</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Golongan Jabatan</td>
        <td>:</td>
        <td>{{$datapendaftar->GOLONGAN}}</td>
        <td>&nbsp;</td>
        <td>Status Pendidikan</td>
        <td>:</td>
        <td>{{$datapendaftar->ST_PEND}}</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Email</td>
        <td>:</td>
        <td>{{$datapendaftar->NO_ANGGOTA}}</td>
        <td>&nbsp;</td>
        <td>Tingkatan / Semester</td>
        <td>:</td>
        <td>{{$datapendaftar->ST_TINGKATAN}}</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>No. Telp &amp; HP</td>
        <td>:</td>
        <td>{{$datapendaftar->NOHP}}</td>
        <td>&nbsp;</td>
        <td>Prov Sekolah</td>
        <td>:</td>
        <td>{{$datapendaftar->PROV_SKL}}</td>
      </tr>
    </table>
   
  </div>
</div>
</body>
</html>
