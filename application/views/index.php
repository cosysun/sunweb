<!DOCTYPE html>
<html lang="en">
  <base href="<?php echo base_url(); $url=base_url(); ?>" />
  <head>
  	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>邮箱</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/rollbox.js"></script>
    <script src="js/menu.js"></script>
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
                	<?php 
							$MenuArray = $menu[0];
							$SubMenuArray = $menu[1];
							foreach ($MenuArray as $menuKey=>$menuValue){
							echo '<li><a class="menu_a" href="#"><span>'.$menuValue.'</span></a>';
							if (!empty($SubMenuArray[$menuKey])) {
								echo '<ul>';
								foreach ($SubMenuArray[$menuKey] as $SubMenuValue)
								{
									echo '<li><a href="#"><span>'.$SubMenuValue.'</span></a></li>';
								}
								echo '</ul>';
							}
							echo '</li>';
						}		
                		
                		?>
                  </ul>
                </div>
            </div>
 
		 </div>
  	</div>
  	<!--//header-->
  	
	<!--page_container-->
  	<div id="main">
    	<div id="main_slider">
            <div id="myCarousel" class="carousel slide">
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <!-- Carousel items -->
              <div class="carousel-inner">
                <div class="active item"><img src="/sunweb/img/slider1.jpg" /><div class="carousel-caption"><h4>S1</h4></div></div>
                <div class="item"><img src="/sunweb/img/slider1.jpg" /></div>
                <div class="item"><img src="/sunweb/img/slider1.jpg" /></div>
              </div>
              <!-- Carousel nav -->
              <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
              <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
        </div>
        <div id="main_left">
        	<div id="main_left_1">
            	<img src="/sunweb/img/index_ab.png">
                <p>   崇尚创新，追求卓越的上海华菱电站成套设备有限公司，坚持在工业自动化领域持续发展，以推动自动化控制系统技术创新进步为己任。公司主要从事提升机电控设备、配电自动化产品和高低压开关柜等高科技产品及其软件的开发与销售；集科研开发，产品制造，技术咨询和技术服务为 ...</p>
            </div>
            <div id="main_left_2">
            	<img src="/sunweb/img/index_vd.jpg">
                <p>视频</p>
            </div>
        </div>
        <div id="main_center">
			<div id="dt">
            	<img src="/sunweb/img/index001.jpg">
                <a href="#" class="more" ><img src="/sunweb/img/more.gif"></a>
                <div id="dt_content">
                	<ul>
                    	<li>2013-12-23 <a href="#">公司举行2012年度年...</a></li>
                    	<li>2013-12-23 <a href="#">公司举行2012年度年...</a></li>
						<li>2013-12-23 <a href="#">公司举行2012年度年...</a></li>
                    	<li>2013-12-23 <a href="#">公司举行2012年度年...</a></li>
                        <li>2013-12-23 <a href="#">公司举行2012年度年...</a></li> 
                    </ul>
                </div>
            </div>
            <div id="gc">
                <img src="/sunweb/img/index002.jpg">
                    <a href="#" class="more" ><img src="/sunweb/img/more.gif"></a>
                    <div id="dt_content">
                        <ul>
                            <li><i class="icon-tasks"></i><a href="#">经典案例</a></li>
                            <li><i class="icon-tasks"></i><a href="#">经典案例</a></li>
							<li><i class="icon-tasks"></i><a href="#">经典案例</a></li>
                            <li><i class="icon-tasks"></i><a href="#">经典案例</a></li>
							<li><i class="icon-tasks"></i><a href="#">经典案例</a></li>                                                        
                        </ul>
                    </div>
            </div>
            <div id="pd">
            	<img src="/sunweb/img/index003.jpg">
				<a href="#" class="more_pd" ><img src="/sunweb/img/more.gif"></a>
                
                <div id="photo">
                    <!--滚动效果-->
                    <div class="rollBox">
                    <div class="LeftBotton" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"><img src="/sunweb/img/but_l.jpg"></div>
                    <div class="Cont" id="ISL_Cont">
                    <div class="ScrCont">
                    <div id="List1">
                    
                    <!-- 图片列表 begin -->
                     <div class="pic">
                      <a href="/" target="_blank"><img src="/sunweb/img/5137_HRB1型模数化住宅箱.jpg" width="210" height="140" /></a>
                     </div>       
                     
                    <div class="pic">
                      <a href="/" target="_blank"><img src="/sunweb/img/2897_HLB3功能化配电箱.jpg" width="210" height="140" /></a>
                     </div>
                     <div class="pic">
                      <a href="/" target="_blank"><img src="/sunweb/img/5137_HRB1型模数化住宅箱.jpg" width="210" height="140" /></a>
                     </div>
                     <div class="pic">
                      <a href="/" target="_blank"><img src="/sunweb/img/5137_HRB1型模数化住宅箱.jpg" width="210" height="140" /></a>
                     </div>
                     <div class="pic">
                      <a href="/" target="_blank"><img src="/sunweb/img/5137_HRB1型模数化住宅箱.jpg" width="210" height="140" /></a>
                     </div>
                    <div class="pic">
                      <a href="/" target="_blank"><img src="/sunweb/img/5137_HRB1型模数化住宅箱.jpg" width="210" height="140" /></a>
                     </div>      
                     <div class="pic">
                      <a href="/" target="_blank"><img src="/sunweb/img/5137_HRB1型模数化住宅箱.jpg" width="210" height="140" /></a>
                     </div>
                    <!-- 图片列表 end -->
                    
                    </div>
                    
                    <div id="List2"></div>
                    </div>
                    </div>
                    <div class="RightBotton" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"><img src="/sunweb/img/but_r.jpg"></div>
                    </div>
                    </div>
                    <!--结束-->
                </div>
            </div>
        </div>
        
        <?php include 'footer.php';?>
    </div>
	<!--page_container-->
	
  </body>
</html>
