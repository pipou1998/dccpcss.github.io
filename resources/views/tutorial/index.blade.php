@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                  
                   <strong>Tutorial</strong>

                </div>
            </div>
            <div class="card-body">
           
                <div class="row">
                    <div class="col-md-4">
                        <iframe src="https://www.youtube.com/embed/xhduvnt1Dek" title="TIPS ON HOW TO PASS TO YOUR CSS NC II ASSESSMENT | ACTUAL AND ORAL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>

                    <div class="col-md-4">
                        <iframe src="https://www.youtube.com/embed/kUsMrc7Ys-E" title="Assessment Procedures Computer System Servicing (CSS)NC 2 Mga dapat mong alam bago ang Assessment" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>

                    <div class="col-md-4">
                        <iframe src="https://www.youtube.com/embed/zxxtXmCZWss" title="Disassembling and Assembling a System Unit. ft. Joshua Cadusale" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                  
                   <strong>Modules</strong>

                </div>
            </div>
            <div class="card-body">
           
                <div class="row">
                    <div class="col-md-12">
                       <ul>
                            <li>
                                <a href="{{ asset('docs/doc1.docx') }}">Modules 1</a>
                            </li>
                            <li>
                                <a href="{{ asset('docs/doc2.docx') }}">Modules 2</a>
                            </li>
                       </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
