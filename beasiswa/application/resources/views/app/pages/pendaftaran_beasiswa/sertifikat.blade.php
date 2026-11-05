
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
 
 @page {
        margin:0.9;padding:0.9; // you can set margin and padding 0 
      } 
body {

	background-size: 1130px 800px;
	background-image: url({{base_path('storage/sertifikat.jpg')}});
    background-repeat: no-repeat;
    background-position: center;
    color: #0033FF;
}

#apDiv2 {
    width: 100%;
    height: 115px;
    margin-top: 320px;
    font-size: 25px;
    text-align: center;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    font-style: italic;
}

#apDiv5 {
	position: absolute;
	width: 383px;
	height: 115px;
	z-index: 2;
    top: 414px;
    left: 573px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-style: italic;
}
#apDiv6 {
    position: absolute;
    width: 451px;
    height: 40px;
    z-index: 2;
    top: 439px;
    left: 573px;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    font-style: italic;
    overflow-y: hidden;
}

#apDiv7 {
	position: absolute;
	width: 383px;
	height: 115px;
	z-index: 2;
    top: 466px;
    left: 573px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-style: italic;
}

#apDiv8 {
	position: absolute;
	width: 383px;
	height: 115px;
	z-index: 2;
    top: 370px;
    left: 648px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-style: italic;
}

</style>


 <div id="apDiv8">
    <h3>{{$datas->ST_PEND}}</h3>
  </div>

  <div id="apDiv2">
    <h3>{{$datas->NM_ANAK}}</h3>
  </div>
 
  <div id="apDiv5">
    <h3>{{$datas->NM_ANGGOTA}}</h3>
  </div>
 
  <div id="apDiv6">
    <h3>{{$datas->NM_PERUSAHAAN}}</h3>
  </div>

  <div id="apDiv7">
    <h3>{{$datas->NO_ANGGOTA}}</h3>
  </div>





