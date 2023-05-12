//Select the answer  
            for(i = 0; i < choose.length; i++) {
                if(choose[i].checked)
                selectedChoose = choose[i].value;
            }
            
            //Check the answer if correct
            for(i=0; records.length > i;i++){
                if(records[i].answer === selectedChoose){
                    console.log('Correct')
                    selectAnswer.push({id:records[ctr].id, question: records[ctr].question, answer: selectedChoose});
                    correctCounter++;
                    break;
                }
                else{
                    console.log('Wrong')
                    selectAnswer.push({id:records[ctr].id, question: records[ctr].question, answer: selectedChoose});
                    wrongCounter++;
                    break;
                }
            }

            //Next Question
            if(records.length >= x){
                
                //Maxed Errors
                if(wrongCounter === 3){
                    document.getElementById('btnNext').classList.add('disabled')   
                }

                
                
                //check the duplicate question
                
                let isProceed = false
                for(x=0; records.length > x;){
                    //Random Question
                    ctr =  Math.floor((Math.random() * records.length ));
                    let temp = records[ctr].id
                    for(y=0; selectAnswer.length > y;y++){
                        if(selectAnswer[y].id === temp){
                            isProceed = true
                        }
                    } 
                    
                    if(isProceed==false){
                        console.log('Next Question')
                        x++
                        break
                    }
                }

            }
            else{
                document.getElementById('btnNext').classList.add('disabled')
            }

            x++;

            

            
            console.log(selectAnswer);

