@extends('layouts.master')

@section('content')
<div class="container" style="z-index: 1; position: relative;">
    <div class="alert alert-danger" role="alert" style="display: none;" id="alert-question">
    
    </div>
<!-- Modal Finish -->

<div id="finish" style="z-index: 2; position: absolute; inset: 0; background-color: rgb(0,0,0, 0.5); display: none; ">
    <!-- <i id="btn-finish" class="fa-solid fa-xmark" style="color: white;position: absolute; right: 10%;top: 2%; font-size: 40px;cursor: pointer;"></i> -->
        <div style="margin-bottom: 50px;"></div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 bg-white">
                <p class="display-1 text-center" style=" color: red;margin-top: 30px; " ><span id="titleCaption"></span></p>
                <form action="{{ route('summaryResult') }}" method="POST">
                @csrf

                    <input type="hidden" name="under" Value="{{ $under }}">
                    <input type="hidden" name="quizno" Value="{{ $quizno }}">

                    <div style="margin-top: 50px; padding:10px">
                        <p class="display-6" style="font-size: 24px;">Summary Result</p>
                        <hr>
                            <table class="table table-sm">
                            <tbody>
                                
                                <tr>
                                <!-- <th scope="row">1</th> -->
                                <td>Correct Score</td>
                                <td style="text-align: right;" ><input type="number" id="totalCorrect"  name="totalCorrect" style="color: red;border: none; text-align: right;pointer-events: none;"></td>
                            
                                </tr>
                                <tr>
                                <!-- <th scope="row">2</th> -->
                                <td>Wrong Score</td>
                                <td style="text-align: right;"><input type="number" id="totalWrong"  name="totalWrong" style="color: red;border: none; text-align: right;pointer-events: none;"> </td>
                                </tr>
                            </tbody>
                            </table>
                            
                        </div>
                       
                        
                        <div>
                            <p class="display-6" style="text-align: right;">Total Question: <input id="maxedQuestion"  name="maxedQuestion"  style=" width: 70px; color: red;border: none; text-align: right; pointer-events: none;"></p>
                            <p style="text-align: right;">Remark:<input id="remarksResult"  name="remarksResult"  style=" width: 60px; color: red;border: none; text-align: right; pointer-events: none;"></p>
                        </div>
                        <div style="padding: 10px;width: 100%; text-align: right;">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

            </div>
            <div class="col-md-2"></div>
        </div>

 </div>

<!-- Modal Finish -->

 
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- Label -->
            <div class="card" style="padding:10px;margin-bottom: 10px;">
                <p class="display-6" style="width: 100%;">Remaining Questions: <span id="total-question"></span></p>
                <div style="display: flex; justify-content: center; align-items: center; gap:20px;  width: 100%;">
                    <div class=" p-1 text-white" style="width: 100%;"> 
                        <div class="bg-success" style="width: 150px; height: 80px; margin: 0 auto; background-color: red;text-align: center;border-radius: 10px;">
                            <span style="font-size: 24px;">Score<span> <p id="scoreCorrect">0</p>
                        </div>
                    </div>
                    <div class="p-1 text-white" style="width: 100%;">
                        <div class="bg-danger" style="width: 150px; height: 80px; margin: 0 auto; background-color: red;text-align: center;border-radius: 10px;">
                            <span style="font-size: 24px;">Wrong<span> <p id="scoreWrong">0</p>
                        </div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; margin-top: 10px; padding: 0px 5px;">
                    <small style="width: 100px;">Energy Level:</small>
                    <div class="progress" style="margin: 10px 0px; width: 100%;">
                        <div class="progress-bar" id="progress-bar" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- Label -->
        <!-- Question -->
            <div class="card bg-success text-white p-4" style="margin-bottom: 20px;">
                <p class="display-6">Question?</p>
                <p class="text-justify" id="question" style="font-style: italic;">
                   
                </p>
            </div>
            <!-- End Question -->

            <!-- Answer -->
            <div class="card p-4">
           
                <p class="h5" style="font-style: italic;">Choose Answer</p> 
                <div style="margin-bottom: 10px;" id="up">
                   
                </div>
                <div style="margin-bottom: 10px;" id="down">
                   
                </div>
                <div style="margin-bottom: 10px;" id="down1">
                   
                </div>
                <div style="margin-bottom: 10px;" id="down2">
                   
                   </div>
                <div  style="margin-top: 20px; display:flex;justify-content: flex-end;">
                
                </div>
            </div>
            <!-- End Answer -->

            <!-- Controller -->
            <div class="card p-4" style="margin-top: 20px;" >
                
                <div
                    style="display: flex;"
                    id="controller"
                >
                    <div style="width: 100%;">
                        <button id="btnStart" style="width: 100%;" class="btn btn-success p-4"><i class="fa-sharp fa-solid fa-play"></i> Start</button>
                    </div>
                    <div style="width: 100%;">
                        <button id="btnNext" class="btn btn-primary p-4 disabled" style="width: 100%;" ><i class="fa-solid fa-forward-step"></i> Next</button>
                    </div>
                </div>
            </div>
            <!-- End Controller -->
            

        </div>
        <div class="col-md-2"></div>
    </div>
</div>


<!-- Modal -->

<!-- Modal -->

<script type="text/javascript">

    let records = <?php echo json_encode($records); ?>;
    let maxedError = <?php echo json_encode($maxedError); ?>;
    let ctr =  0
    const choose = document.getElementsByName('choose');
    let selectedChoose = '';
    const selectAnswer = [];
    let correctCounter = 0;
    let wrongCounter = 0;
    let energy = 0
    const maxedQuestion = <?php echo json_encode($records); ?>

    document.getElementById('btnStart').addEventListener('click',()=>{
        if(records.length == 0){
           document.getElementById('alert-question').innerHTML = ' Please Add Question before take a Quiz!'
           document.getElementById('alert-question').style.display = 'block'
           window.scrollTo(0,0)
           setTimeout(()=>{
            document.getElementById('alert-question').style.opacity = 0
            document.getElementById('alert-question').style.transition = 'opacity 1s'
            
            }, 2000);
            setTimeout(()=>{
            document.getElementById('alert-question').style.display = 'none'    
            document.getElementById('alert-question').style.opacity = 1        
            }, 3000);
            
        }
        else{

            if(maxedError.length == 0){
                document.getElementById('alert-question').innerHTML = ' Please Add Max Error Value before take a Quiz!'
                document.getElementById('alert-question').style.display = 'block'
                window.scrollTo(0,0)
                setTimeout(()=>{
                    document.getElementById('alert-question').style.opacity = 0
                    document.getElementById('alert-question').style.transition = 'opacity 1s'
                    
                    }, 2000);
                    setTimeout(()=>{
                    document.getElementById('alert-question').style.display = 'none'    
                    document.getElementById('alert-question').style.opacity = 1        
                    }, 3000);
                document.getElementById('btnNext').classList.add('disabled')
            }
            else{
                
                energy = 100
                let answerRand = Math.trunc(Math.random()*2)
                console.log('Rand: ' + answerRand)
                if(answerRand == 0){
                    document.getElementById('up').innerHTML = `<input  type="radio" id="answer" style="margin-right: 5px;" name="choose"> <span id="answer-caption"></span>`
                    document.getElementById('down').innerHTML = `<input  type="radio" id="wrong"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption"></span>`
                    document.getElementById('down1').innerHTML = `<input  type="radio" id="wrong1"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption1"></span>`
                    document.getElementById('down2').innerHTML = `<input  type="radio" id="wrong2"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption2"></span>`
                }
                else{
                    document.getElementById('up').innerHTML = `<input  type="radio" id="wrong"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption"></span>`
                    document.getElementById('down').innerHTML = `<input  type="radio" id="answer" style="margin-right: 5px;" name="choose"> <span id="answer-caption"></span>`
                    document.getElementById('down1').innerHTML = `<input  type="radio" id="wrong1"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption1"></span>`
                    document.getElementById('down2').innerHTML = `<input  type="radio" id="wrong2"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption2"></span>`
                }
                ctr =  Math.floor((Math.random() * records.length ))
                document.getElementById('up').innerHTML = `<input disabled type="radio" id="answer" style="margin-right: 5px;" name="choose"> <span id="answer-caption"></span>`
                document.getElementById('down').innerHTML = ` <input disabled type="radio" id="wrong"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption"></span>`
                document.getElementById('down1').innerHTML = ` <input disabled type="radio" id="wrong1"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption1"></span>`
                document.getElementById('down2').innerHTML = ` <input disabled type="radio" id="wrong2"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption2"></span>`
                document.getElementById('btnNext').classList.remove('disabled')
                document.getElementById('btnStart').classList.add('disabled')
                document.getElementById('controller').style.display = 'flex'
                document.getElementById('question').innerHTML = records[ctr].question;
                document.getElementById('answer').setAttribute('value',records[ctr].answer);
                document.getElementById('wrong').setAttribute('value',records[ctr].wrong);
                document.getElementById('wrong1').setAttribute('value',records[ctr].wrong1);
                document.getElementById('wrong2').setAttribute('value',records[ctr].wrong2);
                document.getElementById('answer-caption').innerHTML = records[ctr].answer;
                document.getElementById('wrong-caption').innerHTML = records[ctr].wrong;
                document.getElementById('wrong-caption1').innerHTML = records[ctr].wrong1;
                document.getElementById('wrong-caption2').innerHTML = records[ctr].wrong2;
                document.getElementById('total-question').innerHTML = records.length
                document.getElementById('answer').removeAttribute('disabled')
                document.getElementById('wrong').removeAttribute('disabled')
                document.getElementById('wrong1').removeAttribute('disabled')
                document.getElementById('wrong2').removeAttribute('disabled')
                document.getElementById('progress-bar').style.width = energy + '%'
                document.getElementById('progress-bar').innerHTML = energy + '%'
                document.getElementById('answer').setAttribute('data-id', records[ctr].id)
                document.getElementById('wrong').setAttribute('data-id', records[ctr].id)
                document.getElementById('wrong1').setAttribute('data-id', records[ctr].id)
                document.getElementById('wrong2').setAttribute('data-id', records[ctr].id)
            }

        }
      
        
    })

   

    
    
    document.getElementById('btnNext').addEventListener('click',()=>{

        if(document.getElementById('answer').checked == true || document.getElementById('wrong').checked == true || document.getElementById('wrong1').checked == true || document.getElementById('wrong2').checked == true){
            //alert('Selected')
            let answerID =  document.getElementById('answer').getAttribute('data-id')
            let wrongID =  document.getElementById('wrong').getAttribute('data-id')
            let wrongID1 =  document.getElementById('wrong1').getAttribute('data-id')
            let wrongID2 =  document.getElementById('wrong2').getAttribute('data-id')

       
            for(i = 0; i < choose.length; i++) {
                if(choose[i].checked)
                selectedChoose = choose[i].value;
            }

            //Check the answer if correct
            for(i=0; records.length > i;i++){
               
                if(records[i].answer == selectedChoose && records[i].id == answerID){
                    console.log('Correct')
                    selectAnswer.push({id:records[ctr].id, question: records[ctr].question, answer: selectedChoose});
                    correctCounter++;
                    document.getElementById('scoreCorrect').innerHTML = correctCounter
    
                }
            }

            //Check the answer if wrong
            for(i=0; records.length > i;i++){
                if(records[i].wrong == selectedChoose && records[i].id == wrongID || records[i].wrong1 == selectedChoose && records[i].id == wrongID1 || records[i].wrong2 == selectedChoose && records[i].id == wrongID2){
                    console.log('Wrong')
                    selectAnswer.push({id:records[ctr].id, question: records[ctr].question, answer: selectedChoose});
                    wrongCounter++;
                    document.getElementById('scoreWrong').innerHTML = wrongCounter
                    let maxed = (wrongCounter / maxedError[0].maxedError) * 100
                    console.log("Progress: " + maxed)
                    document.getElementById('progress-bar').style.width = Math.trunc(energy - maxed) + '%'
                    document.getElementById('progress-bar').innerHTML = Math.trunc(energy - maxed) + '%'
                    
                    if(maxed==100){
                        document.getElementById('btnNext').classList.add('disabled')
                        document.getElementById('btnStart').classList.add('disabled')
                        document.getElementById('answer').checked = false
                        document.getElementById('wrong').checked = false
                        document.getElementById('answer').setAttribute('disabled',true)
                        document.getElementById('wrong').setAttribute('disabled',true)
                        document.getElementById('finish').style.display='block'
                        document.getElementById('maxedQuestion').value = maxedQuestion.length
                        document.getElementById('totalCorrect').value = correctCounter
                        document.getElementById('totalWrong').value = wrongCounter
                        let ave = (correctCounter / maxedQuestion.length) * 100
                        if(Math.trunc(ave)>=75){
                            document.getElementById('titleCaption').innerHTML = "Congratulation!"
                            document.getElementById('remarksResult').value = "Passed"
                        }
                        else{
                            document.getElementById('titleCaption').innerHTML = "Sorry but you need to Review Again!"
                            document.getElementById('remarksResult').value = "Failed"
                        }
                    }
                }       
            }

            records.splice(ctr,1)
            console.log(records)
            let answerRand = Math.trunc(Math.random()*2)
            console.log('Rand: ' + answerRand)
            if(answerRand == 0){
                document.getElementById('up').innerHTML = `<input  type="radio" id="answer" style="margin-right: 5px;" name="choose"> <span id="answer-caption"></span>`
                document.getElementById('down').innerHTML = `<input  type="radio" id="wrong"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption"></span>`
                document.getElementById('down1').innerHTML = `<input  type="radio" id="wrong1"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption1"></span>`
                document.getElementById('down2').innerHTML = `<input  type="radio" id="wrong2"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption2"></span>`
            }
            else{
                document.getElementById('up').innerHTML = `<input  type="radio" id="wrong"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption"></span>`
                document.getElementById('down').innerHTML = `<input  type="radio" id="answer" style="margin-right: 5px;" name="choose"> <span id="answer-caption"></span>`
                document.getElementById('down1').innerHTML = `<input  type="radio" id="wrong1"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption1"></span>`
                document.getElementById('down2').innerHTML = `<input  type="radio" id="wrong2"  style="margin-right: 5px;" name="choose"> <span id="wrong-caption2"></span>`
            }
            ctr =  Math.floor((Math.random() * records.length ));
            
            if(records.length == 0){    
                console.log('Done')
                document.getElementById('btnNext').classList.add('disabled')
                document.getElementById('btnStart').classList.add('disabled')
                document.getElementById('answer').checked = false
                document.getElementById('wrong').checked = false
                document.getElementById('wrong1').checked = false
                document.getElementById('wrong2').checked = false
                document.getElementById('answer').setAttribute('disabled',true)
                document.getElementById('wrong').setAttribute('disabled',true)
                document.getElementById('wrong1').setAttribute('disabled',true)
                document.getElementById('wrong2').setAttribute('disabled',true)
                document.getElementById('finish').style.display='block'
                document.getElementById('maxedQuestion').value = maxedQuestion.length
                document.getElementById('totalCorrect').value = correctCounter
                document.getElementById('totalWrong').value = wrongCounter
                let ave = (correctCounter / maxedQuestion.length) * 100
                if(Math.trunc(ave)>=75){
                    document.getElementById('titleCaption').innerHTML = "Congratulation!"
                    document.getElementById('remarksResult').value = "Passed"
                }
                else{
                    document.getElementById('titleCaption').innerHTML = "Sorry but you need to Review Again!"
                    document.getElementById('remarksResult').value = "Failed"
                }
            }
            else{
                document.getElementById('question').innerHTML = records[ctr].question;
                document.getElementById('answer').setAttribute('value',records[ctr].answer);
                document.getElementById('wrong').setAttribute('value',records[ctr].wrong);
                document.getElementById('wrong1').setAttribute('value',records[ctr].wrong1);
                document.getElementById('wrong2').setAttribute('value',records[ctr].wrong2);
                document.getElementById('answer-caption').innerHTML = records[ctr].answer;
                document.getElementById('wrong-caption').innerHTML = records[ctr].wrong;
                document.getElementById('wrong-caption1').innerHTML = records[ctr].wrong1;
                document.getElementById('wrong-caption2').innerHTML = records[ctr].wrong2;
    
                //document.getElementById('btnNext').classList.add('disabled')
                document.getElementById('btnStart').classList.add('disabled')
                document.getElementById('answer').checked = false
                document.getElementById('wrong').checked = false   
                document.getElementById('wrong1').checked = false   
                document.getElementById('wrong2').checked = false
                document.getElementById('answer').setAttribute('data-id', records[ctr].id)
                document.getElementById('wrong').setAttribute('data-id', records[ctr].id)
                document.getElementById('wrong1').setAttribute('data-id', records[ctr].id)
                document.getElementById('wrong2').setAttribute('data-id', records[ctr].id)
    
                document.getElementById('total-question').innerHTML = records.length 

            }


        }
        else{
            document.getElementById('alert-question').innerHTML = ' Please Select your Answer!'
                document.getElementById('alert-question').style.display = 'block'
                window.scrollTo(0,0)
                setTimeout(()=>{
                    document.getElementById('alert-question').style.opacity = 0
                    document.getElementById('alert-question').style.transition = 'opacity 1s'
                    
                    }, 2000);
                    setTimeout(()=>{
                    document.getElementById('alert-question').style.display = 'none'    
                    document.getElementById('alert-question').style.opacity = 1        
                    }, 3000);
        }
    
    })
    
   
</script>


@endsection


