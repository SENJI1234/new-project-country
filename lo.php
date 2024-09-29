    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <style>
   img {
            width: 250px;
            height: 150px;
        }
     
        #one {
            max-height: 250px; /* Set a fixed height */
            overflow-y: auto;  /* Enable vertical scrolling */
             
            position: absolute; /* Position suggestions absolutely */
            background: white; /* Ensure the background is white */
          
        }
        .two{
            display: flex;
            justify-content: center;
        }
      
   
        
    </style>


  <div class="two">
  <div class="three">
    <h1 id="country">Country</h1>
    <h1 id="code">CODES</h1>
    <img src="images/aus.gif" alt="" id="images"><br>
    <input type="text" id="myinput">
    <button id="next">next</button>
    <button id="prev">prev</button>
   
    <div class="one" id="one"></div>
    </div>
    </div>
    </body>
    </html>



    <script>



        const country = document.getElementById("country");
        const code = document.getElementById("code");
        const images = document.getElementById("images");
        const myinput = document.getElementById("myinput");
        const next = document.getElementById("next");
        const one = document.getElementById("one");
        const prev = document.getElementById("prev");
        






    const aray = [

        { images: "phi.gif", code: "PH", country: "Philippines" },
        { images: "russ.gif", code: "RU", country: "Russia" },
        { images: "viet.gif", code: "VN", country: "Vietnam" },
        { images: "phi.gif", code: "PH", country: "Philippines" },
        { images: "russ.gif", code: "RU", country: "Russia" },
        { images: "viet.gif", code: "VN", country: "Vietnam" },
        { images: "phi.gif", code: "PH", country: "Philippines" },
        { images: "russ.gif", code: "RU", country: "Russia" },
        { images: "viet.gif", code: "VN", country: "Vietnam" },



    ]
    let place = aray;
    let index = 0;



    function called(){
        const hi = place [index];
        country.textContent = `COUNTRY:${hi.country}`;
        code.textContent = ` CODE:${hi.code}`;
        images.src = `images/${hi.images}`;
    }
    next.addEventListener('click',()=>{
    index = (index + 1)% place.length;
    called()


    });

    prev.addEventListener('click',()=>{
    index = (index - 1+ place.length) % place.length;

    called();

    })


  myinput.addEventListener('input',ugok)
  myinput.addEventListener('click',ugok)



 function ugok (){
    const sug = myinput.value.toLowerCase();
    one.innerHTML = '';

    if(sug !== ''){
        place.forEach((hi)=>{


    if(hi.country.toLowerCase().includes(sug)){
        const hey = document.createElement('div');

        hey.classList.add('nav');



      const hm = document.createElement('img');
      hm.src = `images/${hi.images}`;
      hm.classList.add('lo')


       hey.appendChild(hm);
       hey.appendChild(document.createTextNode(hi.country))




        hey.addEventListener('click',()=>{
        index = aray.findIndex(c => c. country === hi.country);
        myinput.value = hi.country;
        one.innerHTML = '';
        called()



        })
        one.appendChild(hey);
        
        
    }





        })
    }else{
      place.forEach((hi)=>{
      const hey = document.createElement('div');

        hey.classList.add('nav');



      const hm = document.createElement('img');
      hm.src = `images/${hi.images}`;
      hm.classList.add('lo')


       hey.appendChild(hm);
       hey.appendChild(document.createTextNode(hi.country))



       hey.addEventListener('click',()=>{
        index = aray.findIndex(c => c. country === hi.country);
        myinput.value = hi.country;
        one.innerHTML = '';
        called()



        })
        one.appendChild(hey);



      })




    }
 }
document.addEventListener('click',()=>{
const paps = myinput.contains(event.target);

if(!paps){
    one.innerHTML = '';
}

})

 called()


    </script>