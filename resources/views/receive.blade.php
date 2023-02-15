@extends('layouts.home')
@section('content')
    <hr>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-sm-10 col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header text-center">
                        <h3>Blood Request Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('receiveRequest') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="2" name="type" >
                            <input type="hidden" value="" name="userid" >
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group ">
                                        <label>Name</label>
                                        <input id="name" type="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group ">
                                        <label>Email </label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group ">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group ">
                                        <label>Age</label>
                                        <input type="text" class="form-control @error('age') is-invalid @enderror"
                                            name="age" value="{{ old('age') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group ">
                                        <label>Blood Group</label>
                                        <select class="form-select @error('group') is-invalid @enderror" name="group">
                                            <option selected value="0">Select a blood group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Requisition form</label>
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                            <a href="{{ url(asset('images/blood-request-form.jpg')) }}" class="image-popup-link animate-box"><i class="far fa-hand-point-right"></i> A sample of Blood
                                                requisition form</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea name="note" class="form-control @error('note') is-invalid @enderror resize-none" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Send Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
