<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 150px;
        }
        .ones {
            cursor: pointer; /* Indicate that the items are clickable */
            display: flex; /* Use flex to align image and text */
            align-items: center; /* Center align items */
            margin: 5px 0; /* Add some spacing */
        }
        .ones img {
            margin-right: 10px; /* Space between image and text */
        }
    </style>
</head>
<body>
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
        ];

        let place = aray;
        let index = 0;

        function called() {
            const hays = place[index];
            country.textContent = hays.country;
            code.textContent = `CODE: ${hays.code}`;
            images.src = `images/${hays.images}`;
        }

        next.addEventListener('click', () => {
            index = (index + 1) % place.length;
            called();
        });

        prev.addEventListener('click', () => {
            index = (index - 1 + place.length) % place.length;
            called();
        });

        myinput.addEventListener('input', lo);

        function lo() {
            const hello = myinput.value.toLowerCase();
            one.innerHTML = '';

            if (hello !== '') {
                place.forEach((hays) => {
                    if (hays.country.toLowerCase().includes(hello) || hays.code.toLowerCase().includes(hello)) {
                        const ko = document.createElement('div');
                        ko.classList.add('ones');

                        const img = document.createElement('img');
                        img.src = `images/${hays.images}`;
                        
                        // Create a text node with both country and code
                        const text = document.createTextNode(`${hays.country} (${hays.code})`);

                        ko.appendChild(img);
                        ko.appendChild(text);

                        ko.addEventListener('click', () => {
                            index = aray.findIndex(c => c.country === hays.country);
                            myinput.value = hays.country; // Set to country name
                            one.innerHTML = '';
                            called();
                        });

                        one.appendChild(ko);
                    }
                });
            } else {
                place.forEach((hays) => {
                    const ko = document.createElement('div');
                    ko.classList.add('ones');

                    const img = document.createElement('img');
                    img.src = `images/${hays.images}`;

                    const text = document.createTextNode(`${hays.country} (${hays.code})`);

                    ko.appendChild(img);
                    ko.appendChild(text);

                    ko.addEventListener('click', () => {
                        index = aray.findIndex(c => c.country === hays.country);
                        myinput.value = hays.country; // Set to country name
                        one.innerHTML = '';
                        called();
                    });

                    one.appendChild(ko);
                });
            }
        }



    document.addEventListener('click',()=>{
        const papa = myinput.contains(event.target)
        if(!papa){
            one.innerHTML='';
        }
    })













        called(); // Call the initial function to display the first country
    </script>
</body>
</html>
