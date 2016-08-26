<h1>BelHard work</h1>

<ul id="main-nav">
    @foreach($arr as $v)
        @if($page == $v)
            <li class="current"><a href={{url($v)}}>{{$v}}</a></li>
        @else  
            <li><a href={{url($v)}}>{{$v}}</a></li>
        @endif
    @endforeach
    <!--<li class="current"><a href={{url("/")}}>Resume</a></li>
    <li class="current"><a href={{url("/portfolio")}}>Portfolio</a></li>
    <li class="current"><a href={{url("/project")}}>Project</a></li>
    <li class="current"><a href={{url("/about")}}>About me</a></li>
    <li class="current"><a href={{url("/contact")}}>Contact</a></li>-->
</ul>