@extends('layouts.app')

@section('navbar')
 <li>
        <a class="nav-link" href="{{ route('user.home') }}">
          Home
        </a>
    </li>
    <li>
        <a class="nav-link" href="#">
            My Orders
        </a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('user.menu') }}">
          Menu
        </a>
    </li>
@endsection

@section('our-menu')

      
@endsection          
            