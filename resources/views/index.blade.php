@section('styles')
@parent
<link rel="stylesheet" type="text/css" media="screen" href={{asset('css/main.css')}} />
@endsection



<?php 
    $arr = ['resume','portfolio','project', 'aboutme', 'contact'];
    $count = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
@extends('templates.head')
    <h2>{{$text->name}}</h2>
</head>
<body>
    @if($text->body)
    <div>
        {{$text->body}}
    </div>
    @endif
<div id="page-shadow">

	<div id="page">
	
		<div class="content-innertube">
	
			<div id="header">
			
				
				@include('templates.main-nav')
				<div class="clear"></div>
				
			</div><!-- header end -->
			
			<div id="text"><img src={{asset('img/resume.png')}} alt="" title=""></div>
			<div id="stripe"></div>
			
            
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