document.getElementById('refresh').addEventListener('click', function (e) {
    e.preventDefault();
    fetch('http://localhost/week8/shift/get_card.php?cardtype_id=1')
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            console.log(JSON.stringify(myJson));
            let head = document.getElementById("card");
            let data = myJson;
            head.innerHTML = '<h1>' + data.title + '</h1><p>' + data.description + '</p>';
        });
})