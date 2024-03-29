@extends('templates.main', 
    [
    'sliding' => $sliding, 
    'tagline' => $companies->TagLine,
    'detailsCompanies' => $detailsCompanies,
    'companyName' => $companies->CompanyName,
    'topMenus' => $topMenus,
    'seoHeaders' => $seoHeaders,
    'slideShows' => $slideShows,
    ])

@section('content')
    <!-- ======= About Section ======= -->
    @include('templates.about')

    <!-- ======= Services Section ======= -->
    @include('templates.services')

    <!-- ======= Clients Section ======= -->
    @include('templates.clients')

    <!-- ======= Portfolio Section ======= -->
    @include('templates.portofolio')

    <!-- ======= Team Section ======= -->
    @include('templates.team')

    <!-- ======= Contact Section ======= -->
    @include('templates.contact')
@endsection