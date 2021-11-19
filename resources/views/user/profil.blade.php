@extends('layout.app')
@section('content')
<section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        Profil
                    </p>
                    <h2 class="primary-header ">
                        Update Data
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('component.alert')
                <form action="{{ route('user.profil') }}" class="basic-form" method="POST">
                        @csrf
                        <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="name" value="{{ Auth::user()->name }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" value="{{ Auth::user()->email }}" />
                            </div>
                            <button type="submit" class="w-100 btn btn-primary">Update Profil</button>
                            <p class="text-center subheader mt-4">
                                <img src="/assets/images/ic_secure.svg" alt=""> Your payment is secure and encrypted.
                            </p>
                    </form>
            </div>
        </div>
    </section>
@endsection