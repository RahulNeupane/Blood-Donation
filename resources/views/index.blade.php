@extends('layouts.home')
@section('content')


<div class="hero-section">
  <img src="{{url(asset('images/slider.jpg'))}}" class="d-block w-100 z-1" style="height: 90vh">
  <div class="details">
    <h1>Blood is a life,<br>pass it on !</h1>
    <p>Help us eliminate blood scarcity in Nepal</p>
    <a href=""><span>Donate Now <i class='bx bxs-right-arrow'></i></span></a>
  </div>
  <img src="{{url(asset('images/wave.svg'))}}" class="wave">
</div>

<!-- About Us Section -->
<!-- <section class="whyus" id="whyus">
  <div class="right">
    <img src="{{url(asset('images/whyus.png'))}}" class="why_img" style="height: 50vh;width: 61vh;">
  </div>

  <div class="left">
    <h1>Why LIFELINE?</h1>
    <div class="rectangle_card">
      <div class="one"> <img src="{{url(asset('images/St_line.png'))}}" class="st_line" style="height: 3px;width: 13.5vh;"> </div>
      <div class="two"> <img src="{{url(asset('images/rectangle.png'))}}" class="st_line" style="height: 21px;width: 21px;"> </div>
      <div class="three"> <img src="{{url(asset('images/St_line.png'))}}" class="st_line" style="height: 3px;width: 13.5vh;"> </div>
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
</section> -->


<!-- Whyus Us Section -->
<div class="container mx-auto mt-5 " id="whyus">
  <div class="row">
    <div class="col-lg-6 col-sm-12 col-md-6">
      <div class="img-fluid">
        <img src="{{url(asset('images/whyus.png'))}}" class="why_img" style="height: 50vh;width: 61vh;">
      </div>
    </div>
    <div class="col-lg-6 col-sm-12 col-md-12 pt-10 mx-auto  ">
      <div class="title pt-4">
        <h1 class="d-flex mx-md-auto">Why LIFELINE ?</h1>
        <div class="d-flex md-justify-content-center">
      <div class="one"> <img src="{{url(asset('images/St_line.png'))}}" class="img-fluid items-center" style="height: 3px;width: 13.5vh;"> </div>
      <div class="two"> <img src="{{url(asset('images/rectangle.png'))}}" class="img-fluid" style="height: 21px;width: 21px;"> </div>
      <div class="three"> <img src="{{url(asset('images/St_line.png'))}}" class="img-fluid" style="height: 3px;width: 13.5vh;"> </div>
     </div><br><br>
      </div>
      <p>Existing blood management system in Nepal is manual,cumbersome
        and inefficient. Most blood banks record the information on blood
        collection/supply manually in registers.
        Maintaining blood inventory is tedious with laborious back-
        office paperwork and managing information on availability and
        shortage of blood is a tall task
        A social initiative for a smart, transparent and holistic
        blood management service from collection to supply.
        When it comes to blood, right information at the right time can be the
        answer to a life and death situation.</p>
    </div>
  </div>
</div><br><br>


<!-- About Us Section -->
<div class="container mx-auto mt-5 align-items-center" id="aboutus">
  <div class="row">
    <div class="col-lg-12 align-content-center">
      <div class="title text-center">
        <h1>About US</h1>
        <div class="d-flex justify-content-center  ">
           <div class="one"> <img src="{{url(asset('images/St_line.png'))}}" class="img-fluid " style="height: 3px;width: 13.5vh;"> </div>
           <div class="two"> <img src="{{url(asset('images/rectangle.png'))}}" class="img-fluid" style="height: 21px;width: 21px;"> </div>
           <div class="three"> <img src="{{url(asset('images/St_line.png'))}}" class="img-fluid" style="height: 3px;width: 13.5vh;"> </div>
        </div><br><br>
        <p class="text-center col-lg-10 justify-content-center mx-auto">Existing blood management system in Nepal is manual,cumbersome
        and inefficient. Most blood banks record the information on blood
        collection/supply manually in registers
        Maintaining blood inventory is tedious with laborious back-
        office paperwork and managing information on availability and
        shortage of blood is a tall task
      </p>
      </div>
    </div>
   </div>   
 </div>
<div class="card-container d-flex justify-content-center mt-3">
  <div class="row col-lg-10 col-md-12">
  <div class="col-lg-4 col-sm-6 mb-3 mb-sm-0">
    <div class="card  about_card ml-3">
      <div class="card-body">
        <h5 class="card-title text-center ">Give Donation</h5>
        <p class="card-text text-center pt-2">With supporting text below as a natural lead-in to additional content.</p>
        <div class="d-flex justify-content-center"><a href="#" class="btn text-black text-bold align-self-center ml-auto" style="background: #D9D9D9;border: 3px solid #CF3D3C;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-weight: 500;width:170px">Donate now</a></div>         
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
    <div class="card about_card">
      <div class="card-body">
        <h5 class="card-title text-center">Become a volunteer</h5>
        <p class="card-text text-center pt-2">With supporting text below as a natural lead-in to additional content.</p>
        <div class="d-flex justify-content-center "><a href="#" class="btn text-black text-bold align-self-center ml-auto pt-2" style="background: #D9D9D9;border: 3px solid #CF3D3C;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-weight: 500;width:170px">Become now</a></div>         
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
    <div class="card about_card">
      <div class="card-body">
        <h5 class="card-title text-center">Give Scholarship</h5>
        <p class="card-text text-center pt-2">With supporting text below as a natural lead-in to additional content.</p>
         <div class="d-flex justify-content-center"><a href="#" class="btn text-black text-bold align-self-center ml-auto" style="background: #D9D9D9;border: 3px solid #CF3D3C;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-weight: 500;width:170px">Give now</a></div>         
      </div>
    </div>
  </div>
  </div>
</div>
</div>


@endsection