<!doctype html>
<html>
<head>
	<title>Code Player</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<style type="text/css">
	body {
		margin:0;
		padding: 0;
   		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
   			font-weight: 300;
		}
		#menuBar{
			width:100%;
			height:40px;
			background-color: #3d7ebf;
			border: 1px solid #0c4987;
		}

		#logo{
			padding: 5px 0 0 20px;
			font-weight: bold;
			font-size: 120%;
			float: left;
			color:white;
		}
		#buttonDiv{
			float: right;
			padding: 5px 10px 0 0;

		}
		#runButton{
			font-size: 100%;
			font-weight: bold;
			color:#a31616;
			background-color: white;
			border: 1px solid #0c4987;
			border-radius: 5px;
		}
		#toggles{
			width:400px;
			margin: 0 auto;
			list-style: none;
		}
		#toggles li{
			float: left;
			font-size: 100%;
			font-weight: bold;
			color:#a31616;
			background-color: white;
			border: 1px solid #0c4987;
			border-radius: 5px;
			margin: 3px 1px 3px 1px;
			padding:5px 10px 5px 10px;
		}
		.clear{
			clear:both;
		}
		.codeContainer{
			height: 100%;
			background-color:#fcfdff;
			width:50%;	
			position: relative;	
			float: left;	
		}
		.codeContainer textarea{
			width: 100%;
			height: 100%;
			border: none;
			border-right: 1px solid gray;
			background-color:#fcfdff;
			box-sizing:border-box;
			font-family: monotype;
			font-size: 90%;
			padding: 5px;
		}
		.codeLabel{
			color:gray;
			font-weight: bold;
			position: absolute;
			right:10px;
			top:10px;
		}
		#CSSContainer, #JSContainer, #ConsoleContainer{
			display: none;
		}
		iframe{
			background-color: white;
			height:100%;
			width:80%;
			position: relative;
			left:10px;
			border:none;
		}
		.selected{
			background-color:#a31616 !important;
			color:white !important; 
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="menuBar">
			<div id="logo"> CodePlayer</div>	
			<div id="buttonDiv">
				<button id="runButton">Run</button>
			</div>	
			<ul id="toggles">
				<li class="toggle selected" >HTML</li>
				<li class="toggle">CSS</li>
				<li class="toggle">JS</li>
				<li class="toggle">Console</li>
				<li class="toggle selected">Output</li>
			</ul>
		</div>	
		<div class="clear"></div>
		<div class="codeContainer" id="HTMLContainer">
			<div class="codeLabel">HTML</div>	
			<textarea id="htmlCode"></textarea>
		</div>
		<div class="codeContainer" id="CSSContainer">
			<div class="codeLabel">CSS</div>	
			<textarea id="cssCode"></textarea>
		</div>
		<div class="codeContainer" id="JSContainer">
			<div class="codeLabel">JS</div>	
			<textarea id="jsCode"></textarea>
		</div>
		<div class="codeContainer" id="ConsoleContainer">
			<div class="codeLabel">Console</div>	
			<textarea id="consoleCode"></textarea>
		</div>
		<div class="codeContainer" id="OutputContainer" style="background-color:white">
			<div class="codeLabel">Output</div>
			<iframe id="resultFrame"></iframe>
		</div>	
	</div>	
</body>
<script type="text/javascript">
var windowHeight = $(window).height();
var menuBarHeight = $('#menuBar').height();
var codeContainerHeight = windowHeight - menuBarHeight;
$('.codeContainer').height(codeContainerHeight+"px");

$('.toggle').click(function(){
	$(this).toggleClass("selected");

	var activeDiv=$(this).html();
	$('#'+activeDiv+"Container").toggle();

	var showingDivs = $(".codeContainer").filter(function(){
		return($(this).css("display")!="none");
	}).length;
	
	var width = 100/showingDivs;

	$('.codeContainer').css("width", width+"%");
})
$('#runButton').click(function(){
	$('#resultFrame').contents().find('html').html("<style>"+$('#cssCode').val()+"</style>"+$('#htmlCode').val());
 	 	 	
 	document.getElementById('resultFrame').contentWindow.eval( $('#jsCode').val() );
 });	
</script>
</html>