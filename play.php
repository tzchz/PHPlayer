<?php
$s0 = 0;
$s1 = $s2 = '';
$flag = false;
$dir='/data';
$files = scandir('.' . $dir);
if (is_array($files)){
    foreach ($files as $val){
        if (is_dir('.' . $dir . '/' . $val) == false){
            if($flag){
              $s0 = $s0 + 1;
              $s1 = $s1.'</li><li>';
              $s2 = $s2."','";
            }
            else{
              $flag = true;
            }
            $s1 = $s1.$val;
            $s2 = $s2.$dir.'/'.$val;
        }
    }
}
?>
<html>
<head>
  <title>GH/tzchz/PHPlayer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://cube.me.uk/images/favicon.ico">
  <style>*{
  	margin: 0;
	  padding: 0;
	  text-decoration: none;
	  list-style: none;
  }
  #player{
	  position: absolute;
	  left: 0;
	  top: 0;
  	bottom: 0;
  	right: 0;
	  margin: auto;
	  height: 250px;
	  width: 300px;
	  border: 3px solid black;
	  border-radius: 10%;
	  background-image: url(bkg.jpg);
	  background-size: cover;
  }
  .play{
	  color: white;
	  background-color: #87CEFA;
	  margin:0 6px;
  }
  #player .mlist{
  	margin:10px;
	  background-color: rgba(1,1,1,0.5);
	  height: 165px;
  	border-radius: 5px;
  	overflow-y: scroll;
  }
  #player ul li{
  	line-height:30px;
  	text-align: center;
  	cursor:pointer;	
  	border-radius: 4px;
  }
  #player ul li:hover{
  	line-height:45px;
	  text-align: center;
	  cursor:pointer;
	  margin:0 5px;
	  background-color: #F0F8FF;
	  border-radius:6px;
  }</style>
</head>
<body>
  <div id=player>
    <audio src="" controls class="music"></audio>
    <ul class="mlist">
      <li class="play"><?php echo $s1;?></li>
    </ul>
  </div>
  <script>
var musicNode = document.getElementsByClassName('music')[0];
var     mlist = document.getElementsByClassName('mlist')[0];
var       lis = document.getElementsByTagName('li');
var       len = lis.length;
var  musicsrc =['<?php echo $s2;?>'
   ];
   musicNode.src = musicsrc[0];
 for (var i = 0; i < len; i++) {
 	(function(i){
 		lis[i].onclick =function(){
 		musicNode.src = musicsrc[i];
 		musicNode.load();
 		musicNode.play();
 		for (var j= 0; j < len; j++) {
 			lis[j].className = '';
 		}
 		this.className = 'play';
 	}})(i);
 }
 musicNode.onended =function(){
 	 var ended = getPlay();
     if (ended == <?php echo $s0;?>) {
      musicNode.src = musicsrc[0];
      lis[0].className = 'play'
       lis[ended].className = '';
      musicNode.load();
 	  musicNode.play();
     }else{
      musicNode.src = musicsrc[ended + 1];
      lis[ended + 1].className = 'play';
      lis[ended].className = '';
      musicNode.load();
 	  musicNode.play(); }
 }
function getPlay(){
     for (var i = 0; i < len; i++) {
     	if (lis[i].getAttribute('class') == 'play') {
     		return i;
     	}
      }
}
  </script>
</body>
</html>
