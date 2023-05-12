@extends('layouts.master')

@section('content')

    @include('inc.messages') <!-- Show messages here -->

            <!-- Controller -->
            <div class="card p-4" style="margin-top: 20px;" >
                <div
                    style="display: flex;"
                    id="controller"
                >
                    <div style="width: 100%;">
                        <a class="nav-link {{ Request::path() == 'addquestion' ? 'active' : '' }} {{ Route::currentRouteName() == "addquestion" ? 'active' : '' }}" href="{{ url('/addquestion') }}">    
                            <button style="width: 80%;" class="btn btn-success p-4"><i class="fa-sharp fa-solid fa-play"></i>        
                                    MULTIPLE CHOICE                
                            </button>
                        </a> 
                    </div>
                    <div style="width: 100%;">
                        <a class="nav-link {{ Request::path() == 'addquestion2' ? 'active' : '' }} {{ Route::currentRouteName() == "addquestion2" ? 'active' : '' }}" href="{{ url('/addquestion2') }}">    
                                <button style="width: 80%;" class="btn btn-success p-4"><i class="fa-sharp fa-solid fa-play"></i>        
                                        TRUE OR FALSE             
                                </button>
                        </a> 
                    </div>
                </div>
            </div>
            <!-- End Controller -->
            <!-- <script>
                function open_multi()
                {
                    if(a==1)
                        document.getElementById("asd").style.display="none";
                    else
                        document.getElementById("asd").style.display="block";
                }
            </script> -->

    
@endsection
