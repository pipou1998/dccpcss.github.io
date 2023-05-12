
const droppableElement = document.querySelectorAll('.drop-image-mother-board');
const draggableElement = document.querySelectorAll('.drag-image-mother-board');


const droppableElementMotherBoard = document.querySelectorAll('.drop-image');
const draggableElementMotherBoard = document.querySelectorAll('.drag-image');

const moduleOne = document.getElementById('module-one')
const moduleTwo = document.getElementById('module-two')
const btnAnswer = document.getElementById('answer')
const btnReset = document.getElementById('reset')

const summaryButton = document.getElementById('summary')

let isModuleOne = false
let isModuleTwo = false

const systemUnitAnswer = []
const systemUnitWrong = []
let systemUnitScore = 0
let draggableId = ''

const motherBoardAnswer = []
const motherBoardWrong = []
let motherBoardScore = 0

summaryButton.addEventListener('click',()=>{

    document.querySelector('.module-one-lesson').style.display = "none"
    document.querySelector('.module-two-lesson').style.display = "none"
    document.querySelector('.summary-container').style.display = "block"
    document.getElementById('system-unit-score').innerHTML = "4"
    document.getElementById('mother-board-score').innerHTML = "10"
    document.getElementById('control').style.display="none"
    let ave = systemUnitScore + motherBoardScore

    document.getElementById('score').value = ave

    if(ave==14){
        document.getElementById('pf').value = "Passed"
    }
    else{
        document.getElementById('pf').value = "Failed"
    }

})


moduleOne.addEventListener('click',()=>{
    isModuleOne = true
    isModuleTwo = false
    document.querySelector('.cover').style.display="none"
    document.querySelector('.module-one-lesson').style.display = "block"
    document.getElementById('control').style.display="block"
    document.querySelector('.module-two-lesson').style.display="none"
    document.querySelector('.summary-container').style.display = "none"
})


moduleTwo.addEventListener('click',()=>{
    isModuleOne = false
    isModuleTwo = true
    document.querySelector('.cover').style.display="none"
    document.querySelector('.module-two-lesson').style.display = "block"
    document.getElementById('control').style.display="block"
    document.querySelector('.module-one-lesson').style.display = "none"
    document.querySelector('.summary-container').style.display = "none"
})




btnAnswer.addEventListener('click',()=>{
    
    if(isModuleOne){

        window.alert('ANSWER SUBMITED')

        systemUnitAnswer.forEach((elem)=>{
           
        })


        systemUnitWrong.forEach((elem)=>{
            if(elem==="power-supply"){
                //document.getElementById('icon-power-supply').classList.add('fa-xmark')
                //document.getElementById('icon-power-supply').classList.add('icon-wrong')
            }

            if(elem==="hard-disk"){

            }

            if(elem==="cd-rom"){
                //document.getElementById('icon-cd-rom').classList.add('fa-xmark')
                //document.getElementById('icon-cd-rom').classList.add('icon-wrong')
            }

            if(elem==="mother-board"){
                //document.getElementById('icon-mother-board').classList.add('fa-xmark')
                //document.getElementById('icon-mother-board').classList.add('icon-wrong')
            }
        })

    }


    if(isModuleTwo){

        window.alert('ANSWER SUBMITED')


        motherBoardAnswer.forEach((elem)=>{
            if(elem==="ram"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="pci-xpress"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="pci"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="cpu"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="pin-atx-24"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="cmos"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="internal-usb"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="ide"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="pin-atx-4"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }

            if(elem==="sata"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-check')
                //document.getElementById(`icon-${elem}`).classList.add('icon-check')
            }
        })




        motherBoardWrong.forEach((elem)=>{
            if(elem==="ram"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="pci-xpress"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="pci"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="cpu"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="pin-atx-24"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="cmos"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="internal-usb"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="ide"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="pin-atx-4"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }

            if(elem==="sata"){
                //document.getElementById(`icon-${elem}`).classList.add('fa-xmark')
                //document.getElementById(`icon-${elem}`).classList.add('icon-wrong')
            }
        })


    }
})


btnReset.addEventListener('click',()=>{
    if(isModuleOne){
        
        // document.getElementById('power-supply').innerHTML = `<i class="fa" id="icon-power-supply"></i><span class="caption caption-power-supply">Power Supply</span>`
        // document.getElementById('hard-disk').innerHTML = `<span class="caption caption-hard-disk">Hard Disk</span>`
        // document.getElementById('cd-rom').innerHTML = `<i class="fa" id="icon-cd-rom"></i><span class="caption caption-cd-rom">CD-ROM</span>`
        // document.getElementById('mother-board').innerHTML = `<i class="fa" id="icon-mother-board"></i><span class="caption caption-mother-board">Mother Board</span>`
        document.getElementById('power-supply').innerHTML = `<i class="fa" id="icon-power-supply"></i><span class="caption caption-power-supply">Power Supply</span>`
        document.getElementById('IO').innerHTML = `<span class="caption caption-IO">IO</span>`
        document.getElementById('hard-disk').innerHTML = `<span class="caption caption-hard-disk">Hard Disk</span>`
        document.getElementById('mother-board').innerHTML = `<span class="caption caption-mother-board">Mother Board</span>`
        for(let i=0; 4 > i; i++){
            systemUnitAnswer.splice(0,1)
            systemUnitWrong.splice(0,1)
        }
        document.getElementById('power-supply').style.pointerEvents = "auto"
        document.getElementById('hard-disk').style.pointerEvents = "auto"
        document.getElementById('IO').style.pointerEvents = "auto"
        //document.getElementById('cd-rom').style.pointerEvents = "auto"
        document.getElementById('mother-board').style.pointerEvents = "auto"
        systemUnitScore = 0
    }


    if(isModuleTwo){

        document.getElementById('ram').innerHTML = `<i class="fa" id="icon-ram"></i><span class="caption caption-edit caption-ram">Ram Memory</span>`
        document.getElementById('pci-xpress').innerHTML = `<i class="fa" id="icon-pci-xpress"></i><span class="caption caption-edit caption-vertical caption-pci-xpress">PCI Express</span>`
        document.getElementById('pci').innerHTML = `<i class="fa" id="icon-pci"></i><span class="caption caption-edit caption-pci">PCI</span>`
        document.getElementById('cpu').innerHTML = `<i class="fa" id="icon-cpu"></i><span class="caption caption-edit caption-cpu">CPU</span>`
        document.getElementById('pin-atx-24').innerHTML = `<i class="fa" id="icon-pin-atx-24"></i><span class="caption caption-edit  caption-pin-atx-24">24 PIN ATX</span>`
        document.getElementById('cmos').innerHTML = `<i class="fa" id="icon-cmos"></i><span class="caption caption-edit caption-cmos">CMOS</span>`
        document.getElementById('internal-usb').innerHTML = `<i class="fa" id="icon-internal-usb"></i><span class="caption caption-edit caption-vertical caption-internal-usb">USB</span>`
        document.getElementById('ide').innerHTML = `<i class="fa" id="icon-ide"></i><span class="caption caption-edit caption-vertical caption-ide">IDE</span>`
        document.getElementById('pin-atx-4').innerHTML = `<i class="fa" id="icon-pin-atx-4"></i><span class="caption caption-edit caption-pin-atx-4">4 PIN ATX</span>`
        document.getElementById('sata').innerHTML = `<i class="fa" id="icon-sata"></i><span class="caption caption-edit caption-sata">SATA</span>`

        
        document.getElementById('ram').style.pointerEvents="auto"
        document.getElementById('pci-xpress').style.pointerEvents="auto"
        document.getElementById('pci').style.pointerEvents="auto"
        document.getElementById('cpu').style.pointerEvents="auto"
        document.getElementById('pin-atx-24').style.pointerEvents="auto"
        document.getElementById('cmos').style.pointerEvents="auto"
        document.getElementById('internal-usb').style.pointerEvents="auto"
        document.getElementById('ide').style.pointerEvents="auto"
        document.getElementById('pin-atx-4').style.pointerEvents="auto"
        document.getElementById('sata').style.pointerEvents="auto"

        
         for(let i=0; 11 > i; i++){
            motherBoardAnswer.splice(0,1)
            motherBoardWrong.splice(0,1)
        }

        
        let id = [
            'ram',
            'pci-xpress',
            'pci',
            'cpu',
            'pin-atx-24',
            'cmos',
            'internal-usb',
            'ide',
            'pin-atx-4',
            'sata'
        ]
        for(let i=0; id.length > i; i++){
            document.getElementById(id[i]).style.backgroundColor="transparent"
        }  
        motherBoardScore = 0

    }

})


draggableElementMotherBoard.forEach((elem)=>{
    elem.addEventListener('dragstart',dragStart)
    
   
})


draggableElement.forEach((elem)=>{
    elem.addEventListener('dragstart',dragStart)
    
})


droppableElementMotherBoard.forEach((elem)=>{
    elem.addEventListener('dragover',dragOver)
    elem.addEventListener('drop',drop)
   
})


droppableElement.forEach((elem)=>{
    elem.addEventListener('dragover',dragOver)
    elem.addEventListener('drop',drop)
})


function dragStart(e){
    e.dataTransfer.setData('text',e.target.id)
    draggableId = e.target.getAttribute('data-info')    
}




function dragOver(e){
    e.preventDefault()
    console.log('DragOver', e.target.id)
   
}


function drop(e){
    e.preventDefault();
    const draggableElemData = e.dataTransfer.getData('text')
    const droppableElemData = e.target.id 
    

    if(droppableElemData === draggableId){
        if(e.target.id === "power-supply" || e.target.id === "hard-disk" || e.target.id === "IO" || e.target.id === "mother-board"){
            systemUnitAnswer.push(e.target.id)        
            systemUnitScore++
        }
        else{
            motherBoardAnswer.push(e.target.id)
            motherBoardScore++
        }
    }  
    else{
        if(e.target.id === "power-supply" || e.target.id === "hard-disk" || e.target.id === "IO" || e.target.id === "mother-board"){
            systemUnitWrong.push(e.target.id)
        }
        else{
            motherBoardWrong.push(e.target.id)
        }
        
    }
    
    console.log('Score: ' + systemUnitScore)
    console.log('Correct Answer: ' + systemUnitAnswer)
    console.log('Wrong: ' + systemUnitWrong)
    
  e.target.appendChild(document.getElementById(draggableElemData).cloneNode(true))
    const draggableElem = document.getElementById(draggableElemData)
    draggableElem.setAttribute("draggable", "false");
   


    
    if(e.target.id === "power-supply"){
        document.querySelector('.caption-power-supply').style.display = "none"
        document.getElementById('power-supply').style.pointerEvents = "none"
    }

    if(e.target.id === "hard-disk"){
        document.querySelector('.caption-hard-disk').style.display = "none"
        document.getElementById('hard-disk').style.pointerEvents = "none"
    }

    if(e.target.id === "IO"){
        document.querySelector('.caption-IO').style.display = "none"
        document.getElementById('IO').style.pointerEvents = "none"
    }

    if(e.target.id === "mother-board"){
        document.querySelector('.caption-mother-board').style.display = "none"
        document.getElementById('mother-board').style.pointerEvents = "none"
    }
      


    if(e.target.id === "ram"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff"
    }

    if(e.target.id === "pci-xpress"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "pci"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "cpu"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "cmos"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "pin-atx-24"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "internal-usb"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "ide"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "pin-atx-4"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }

    if(e.target.id === "sata"){
        document.querySelector(`.caption-${e.target.id}`).style.display="none"
        document.getElementById(e.target.id).style.pointerEvents="none"
        document.getElementById(e.target.id).style.background="#fff" 
    }




   
   
   
}