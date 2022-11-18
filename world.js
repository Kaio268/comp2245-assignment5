window.addEventListener('DOMContentLoaded', (event)=>{


    let btn = document.getElementById("lookup");
    let Entry = document.querySelector("#country");
    let url = `http://localhost/comp2245-assignment5/world.php?country=`;
    btn.onclick = function() {Country()}
    
    
    
    function Country() 
    {
    
    
    fetch(url+Entry.value)
    .then(response => response.text())
    .then(data =>{
    
    let theResult = document.getElementById("result");
    theResult.innerHTML = data;
    })
    
    };
    });
    
    
    
    
    window.addEventListener('DOMContentLoaded', (event)=>{
    
    
    let btn2 = document.getElementById("theCity");
    let text = document.querySelector("#country");
    let url = `http://localhost/comp2245-assignment5/world.php?country=`;
    btn2.onclick = function() {City()}
    
    
    
    function City() 
    {
    
    
    fetch(url+text.value+`&lookup=cities`)
    .then(response => response.text())
    .then(data =>{
    document.getElementById("result").className ="visible";
    let theResult = document.getElementById("result");
    theResult.innerHTML = data;
    })
    
    };
    });