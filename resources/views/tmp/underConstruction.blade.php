@extends('layouts.app')
@section('underConstruction')
<div class="conatiner-fluid ">
    <div class="container">
        <div class="row justify-content-center">
            <h1> This page is under construction!</h1>
            <p> There are a lot of improvements soon to come! Check back periodically for more information!</p>
            <p> In the meantime, please contact Moira Humphrey at mhumphrey@san.rr.com </p>
        </div>
    </div>
</div>
    <script>
        let current = document.getElementsByClassName('active');
        if(current[0]){
            console.log(current);
            current[0].classList.remove('active');
        }
        let active = document.querySelector('a[href=\'/events\']');
        if(active){
            active.classList.add('active');
        }
    </script>
@endsection
