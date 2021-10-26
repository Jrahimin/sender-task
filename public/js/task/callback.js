function checkAge(data) {
    if(data.age < 18){
        console.log('age : '+data.age+'. '+data.email+' is not valid email.');
        alert('age : '+data.age+'. '+data.email+' is not valid email.');
    } else{
        console.log('age : '+data.age+'. '+data.email+' is valid email.');
        alert('age : '+data.age+'. '+data.email+' is valid email.');
    }
}

function processInput(data, checkAge) {
    checkAge(data);
}

$("button").click(function (e) {
    e.preventDefault();

    let email = $("#email").val();
    let age = $("#age").val();
    let data = {email:email, age:age};

    processInput(data, checkAge);
});