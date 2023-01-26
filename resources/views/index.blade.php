@extends('layouts.home')
@section('content')


    <div class="hero-section">
        <img src="{{url(asset('images/slider.jpg'))}}" class="d-block w-100 z-1"  style="height: 90vh">
        <div class="details">
            <h1>Blood is a life,<br>pass it on !</h1>
            <p>Help us eliminate blood scarcity in Nepal</p>
            <a href=""><span>Donate Now <i class='bx bxs-right-arrow'></i></span></a>
        </div>
        <img src="{{url(asset('images/wave.svg'))}}" class="wave">    
    </div>
    
    <!-- About Us Section -->
    <section class="container" id="whyus">   
      <div class="right">
      <img src="{{url(asset('images/whyus.png'))}}" class="why_img"  style="height: 50vh;width: 61vh;">
      </div>

     <div class="left">
      <h1>Why LIFELINE?</h1>    
       <div class="rectangle_card">
         <div class="one"> <img src="{{url(asset('images/St_line.png'))}}" class="st_line"  style="height: 3px;width: 13.5vh;"> </div>    
         <div class="two"> <img src="{{url(asset('images/rectangle.png'))}}" class="st_line"  style="height: 21px;width: 21px;"> </div>    
         <div class="three"> <img src="{{url(asset('images/St_line.png'))}}" class="st_line"  style="height: 3px;width: 13.5vh;"> </div>    
       </div><br><br>
       <div class="paragraph">
       <p>Existing blood management system in Nepal is manual,cumbersome<br>
       and inefficient. Most blood banks record the information on blood<br>
       collection/supply manually in registers.</p><br>
       <p>Maintaining blood inventory is tedious with laborious back-<br>
       office paperwork and managing information on availability and <br> 
       shortage of blood is a tall task</p><br>
       <p>A social initiative for a smart, transparent and holistic<br>
        blood management service from collection to supply.</p>
        <p>When it comes to blood, right information at the right time can be the <br>
         answer to a life and death situation.</p>
       </div>
     </div>
    
 </section>
@endsection

