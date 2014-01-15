<!DOCTYPE html>
<html lang="en">
  <base href="<?php echo base_url(); $url=base_url(); ?>" />
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>产品</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
	<link href="css/style.css" rel="stylesheet" media="screen">
  </head>
  <body>
    
<div class="container">
  	<!--//header-->  
  	<div id="header">
  		<div class="container">
  			<div class="row">
  				<div class="span8"><a href="#"><img src="img/logo.jpg" /></a></div>
                    <div class="span2 lang">
                        <a href="#"><img src="img/ch_lang.jpg" /></a><a href="#"><img src="img/en_lang.jpg" /></a>
                    </div>
			</div>
			
            <div id="menu">
                <div id="menu_l"></div>
                <div id="menu_r"></div>
                <div class="menu_main">
                <ul>
                    <li><a href="<?php echo base_url(); ?>"><span>首页</span></a></li>
                    <li><a href="#"><span>企业新闻</span></a></li>
                    <li><a href="#"><span>企业简介</span></a></li>
                    <li><a id="menu_current" href="#"><span>产品展厅</span></a>
                        <ul>
							<li><a href="#"><span>产品1</span></a></li>
                            <li><a href="#"><span>产品2</span></a></li>
                            <li><a href="#"><span>产品3</span></a></li>                   
                        </ul>
                    </li>
                    <li><a href="#"><span>联系我们</span></a></li>
                  </ul>
                </div>
            </div>
 
		 </div>
  	</div>
  	<!--//header-->
  	
	<!--page_main-->
  	<div id="main">
    	<div id="main_slider">
        	<img src="/sunweb/img/product.jpg" >
        </div>
        <div id="main_left">
        	<div id="main_left_1">
            	<div id="left_pd"><span>产品中心</span></div>
                <div class="suckerdiv">
                    <ul id="suckertree1">
                    <li><a href="#">提升机电控系统</a></li>
                    <li><a href="#">提升机电控系统</a></li>
                    <li><a href="#">提升机电控系统</a>
                      <ul>
                      <li><a href="#">低压交直交变频控制系统</a></li>
                      <li><a href="#">低压交直交变频控制系统</a></li>
                      </ul>
                    </li>
                    <li><a href="#">提升机电控系统</a></li>
                    <li><a href="#">提升机电控系统</a>
                      <ul>
                      <li><a href="#">低压交直交变频控制系统</a></li>
                      <li><a href="#">低压交直交变频控制系统</a></li>
                      </ul>
                    </li>
                    </ul>
                    </div>
                </div>
             <div id="main_left_2"><img src="/sunweb/img/tel001.jpg"></div>
        </div>
        <div id="main_center">
            <div id="main_breadcrumb">
            <ul class="breadcrumb">
              <li><a href="#">首页</a> <span class="divider">/</span></li>
              <li class="active">产品中心</li>
            </ul>	
            </div>
        </div>
    </div>
	<!--page_main-->
	
	<?php include 'footer.php';?>
    </div>

<script type="text/javascript">
	var menuids=["suckertree1"] //Enter id(s) of SuckerTree UL menus, separated by commas
	function buildsubmenus(){
	for (var i=0; i<menuids.length; i++){
	  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
		for (var t=0; t<ultags.length; t++){
		ultags[t].parentNode.getElementsByTagName("a")[0].className="subfolderstyle"
		ultags[t].parentNode.onmouseover=function(){
		this.getElementsByTagName("ul")[0].style.display="block"
		}
		ultags[t].parentNode.onmouseout=function(){
		this.getElementsByTagName("ul")[0].style.display="none"
		}
		}
	  }
	}
	
	if (window.addEventListener)
	window.addEventListener("load", buildsubmenus, false)
	else if (window.attachEvent)
	window.attachEvent("onload", buildsubmenus)
</script>
    
  </body>
</html>
