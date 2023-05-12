@extends('layouts.master')

@section('content')



<div class="container" style="position: relative;">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert" id="message" style="position: absolute; top:-10px; left:0;right: 0;">
       {{ session()->get('success') }}
    </div>
    @endif
   <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <p class="display-6">Add Question</p>
            
            <div>
                <form action="{{ route('addquestions2') }}" method="POST">
                @csrf
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="about">ABOUT</label>
                        <input type="text" name="about" value="{{ old('about') }}" class="form-control" id="about" aria-describedby="emailHelp" placeholder="ex: MOTHERBOARD">
                        @if($errors->has('about'))
                            <small class="text-danger">* Required</small>
                        @endif
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="quiz_no">QUIZ #</label>
                        <input type="text" name="quiz_no" value="{{ old('quiz_no') }}" class="form-control" id="quiz_no" aria-describedby="emailHelp" placeholder="ex: QUIZ NO 1">
                        @if($errors->has('quiz_no'))
                            <small class="text-danger">* Required</small>
                        @endif
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="question">Question</label>
                        <input type="text" name="question" value="{{ old('question') }}" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter Question">
                        @if($errors->has('question'))
                            <small class="text-danger">* Required</small>
                        @endif
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="answer">True Answer</label>
                        <input type="text" name="answer" value="{{ old('answer') }}" class="form-control" id="answer" aria-describedby="emailHelp" placeholder="Enter Answer">
                        @if($errors->has('answer'))
                            <small class="text-danger">* Required</small>
                        @endif
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="wrong">False Answer</label>
                        <input type="text" name="wrong" value="{{ old('wrong') }}" class="form-control" id="wrong" aria-describedby="emailHelp" placeholder="Enter Wrong">
                        @if($errors->has('wrong'))
                            <small class="text-danger">* Required</small>
                        @endif
                    </div>
                    <!-- <div class="form-group" style="margin-bottom: 20px;">
                        <label for="quiz_no">Quiz No.</label>
                        <select id="quiz_no" name="quiz_no">
                            <option value="Q1">Quiz 1</option>
                            <option value="Q2">Quiz 2</option>                
                        </select>
                        @if($errors->has('quiz_no'))
                            <small class="text-danger">* Required</small>
                        @endif
                    </div> -->
                    <div class="form-group" style="margin-bottom: 20px;">
                        <div style="display: flex; gap: 5px; align-items: center;">
                            <input type="checkbox"  name="maxedError" id="maxedError" aria-label="Checkbox for following max error">
                            <label for="max_error">Max Error</label>
                        </div>
                        <input type="number" disabled  name="max_error" value="{{ old('max_error') }}" class="form-control" id="max_error" aria-describedby="emailHelp" placeholder="Enter Max Error">
                        @if($errors->has('max_error'))
                            <small class="text-danger">* Required</small>
                        @endif
                    </div>
                    <button class="btn btn-primary" type="submit">ADD QUESTION</button>
                    <button class="btn btn-primary" type="reset">RESET</button>
                    
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
   </div>
</div>

<script type="text/javascript">
    const myTimeout = setTimeout(()=>{
       document.getElementById('message').style.opacity = 0
       document.getElementById('message').style.transition = 'opacity 1s'
      
    }, 2000);

    document.getElementById('maxedError').addEventListener('click',()=>{
        const checkBoxButton = document.getElementById('maxedError')
        if(checkBoxButton.checked == true){
            document.getElementById('max_error').removeAttribute('disabled')
        }
        else{
            document.getElementById('max_error').setAttribute('disabled',true)
        }
    })

</script>


@endsection