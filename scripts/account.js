const personalChanger = document.getElementById("personal-data-change");
let inputs = document.getElementsByClassName('personal-data-element-input');
const personalSaverButton = $('#personal-data-button');

personalChanger.addEventListener('click',function(){
    
    if(personalChanger.innerText == "Изменить")
    {
    for(let i = 0;i<inputs.length;i++){
        inputs[i].classList.remove('disable');
        $('.personal-data-element-input').css('background','#f4f6f8');
        
    }
    personalChanger.innerText = "Отменить";
    personalSaverButton.removeAttr('disabled');

    }
    else if(personalChanger.innerText == "Отменить")
    {
        for(let i = 0;i<inputs.length;i++){
            inputs[i].classList.add('disable');
            $('.personal-data-element-input').css('background','#ffffff');
        }
        personalChanger.innerText = "Изменить";
        personalSaverButton.attr('disabled','disabled');
    }
    
  
});


const trackChanger = document.getElementById("track-data-change");
let trackInputs = document.getElementsByClassName("track-data-element-input");
const trackSaverButton = $("#track-data-button");

trackChanger.addEventListener('click',function(){
    
    if(trackChanger.innerText == "Изменить")
    {
    for(let i = 0;i<trackInputs.length;i++){
        trackInputs[i].classList.remove('disable');
        $('.track-data-element-input').css('background','#f4f6f8');
        
    }
    trackChanger.innerText = "Отменить";
    trackSaverButton.removeAttr('disabled');

    }
    else if(trackChanger.innerText == "Отменить")
    {
        for(let i = 0;i<trackInputs.length;i++){
            trackInputs[i].classList.add('disable');
            $('.track-data-element-input').css('background','#ffffff');
        }
        trackChanger.innerText = "Изменить";
        trackSaverButton.attr('disabled','disabled');
    }
    
  
});
