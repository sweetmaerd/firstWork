@if($page == 'contact')
    session_name("fancyform");
    session_start();



    $_SESSION['n1'] = rand(1,20);
    $_SESSION['n2'] = rand(1,20);
    $_SESSION['expect'] = $_SESSION['n1']+$_SESSION['n2'];


    $str='';
    if($_SESSION['errStr'])
    {
        $str='<div class="error">'.$_SESSION['errStr'].'</div>';
        unset($_SESSION['errStr']);
    }

    $success='';
    if($_SESSION['sent'])
    {
        $success='<h1 class="mail-sent">Thank you!</h1>';

        $css='<style type="text/css">#contact-form{display:none;}</style>';

        unset($_SESSION['sent']);
    }
@endif
<!DOCTYPE html>
<html lang="en">
<head>
@extends('templates.head')
</head>
<body>

<div id="page-shadow">

	<div id="page">
	
		<div class="content-innertube">
	
			<div id="header">
			
				
				@include('templates.main-nav')
				<div class="clear"></div>
				
			</div><!-- header end -->
			
			<div id="text"><img src={{asset('img/resume.png')}} alt="" title=""></div>
			<div id="stripe"></div>
			
		    @include($content)
			
		
		</div><!-- content-innertube end -->
		<div class="clear"></div>
		
       <div id="footer"> 
        
        <div id="footer-innertube">
        
            <div id="footer-address">
               <h5>Address</h5>
                <ul>
                @include('templates.address')
                </ul>
            </div><!-- footer-address end -->
            
            <div id="footer-contact">
                @include('templates.contact')
            </div><!-- footer-contact end -->
				
            <div id="footer-social">
                @include('templates.social')
            </div><!-- footer-social end -->
				
				<div id="footer-resume">
				    @include('templates.resume')
				</div><!-- footer-resume end -->
				
				<div class="clear"></div>
				
				@include('templates.footer-nav')
				
			
		<div id="go-top"></div>
			    	
        <div class="clear"></div>
			
        </div><!-- footer-innertube end -->		      
        
		</div><!-- footer end -->
		
	</div><!-- page end -->
	
</div><!-- page-shadow end -->

</body>
</html>